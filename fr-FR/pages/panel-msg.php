<?php 
	if(isLogged() == 0){
        header("Location:index.php?p=signin");
    }

    $password = $_SESSION['password'];

    if ($_SESSION['password'] == 'StaffGloweHF') {

	?>

	<section>
		
		<div id="panel-div-stockage">

			<div style="height: 4.5em; width: 100%; float: right; margin-left: 0.005em; background-color: #606060; margin-top: 2.6em; position: fixed;">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=panel" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Message Reçus</h2></center>

			</div>

			<br><br><br><br><br><br><br><br>

			<center>
				
				<?php

					foreach(messages_contact() as $msg){
						if($msg->sender != $_SESSION['u610518065_test']){

							/* --------------------------------------------- */
							
							$host = '127.0.0.1';
							$dbname = 'u610518065_test';
							$username = 'u610518065_climix12';
							$password = '!Jalnelg5';
								
							$dsn = "mysql:host=$host;dbname=$dbname"; 
							$sql = "SELECT * FROM `contact`";
							
							try{
								$pdo = new PDO($dsn, $username, $password);
								$stmt = $pdo->query($sql);
							
								if($stmt == false){
									die("Erreur");
								}
							
							}catch (PDOException $e){
								echo $e->getMessage();
							}

							/* --------------------------------------------- */

							while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
								
								$date = date_create($row['date']);

								$date_format = date_format($date, 'd/m/Y');

								?>

									<div class="msg">
										<span>Message envoyer le <?= $date_format ?></span><br/>
										<span>Envoyer par <?= $msg->name ?> (<?= $msg->sender ?>)</span><br/><br>
										<span>Message :<br><?= $msg->message ?></span><br/><br>
										<button href="#response_aside" class="js-modal" id="button-rep">Répondre</button>
									</div>

									<style type="text/css">
							
										#button-rep
										{
											background-color:#c82020;
											border:2px solid #c82020;
											display:block;
											width:97%;
											height:36px;
											color:#fff;
											border-radius:2px;
											cursor:pointer;
											font-size:16px;
											margin:5px 0;
											outline:none;
											transition: 0.7s;
										}

										#button-rep:hover
										{
											background:#fff;
											border:#fff;
											color:#3c3c3c;
											transition: 0.8s;
										}

									</style>

									<aside id="response_aside" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

										<div class="modal-wrapper js-modal-stop">

											<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

											<br><br>
									
											<?php
									
												if(isset($_POST['response_message'])) {
													$response = htmlspecialchars(trim($_POST['response']));
													$sender_mail = $msg->sender;

													$to = $sender_mail;
													$subject = '=?UTF-8?B?' . base64_encode('Réponse de l\'équipe d\'assistance de Glowe') . '?=';
													$message = '
													
														<html lang="fr">
															<head>
																<meta charset="UTF-8">
															</head>
														<body>
															<section>

																<div style="background-color:#34495e;color:#fff;font-family:\'Arial\';">
																	<br>
																	<center>
																	
																		<a href="https://glowe.fr/"><img src="https://glowe.fr/img/GloweCompareImg.png"></a><br>
																		<h3>Réponse Glowe à propos de votre message.<h3><br>

																	</center>

																</div>

																<div style="background-color:#f0f3f4;color:#fff;font-family:\'Arial\';margin-top:-2em;">
																	<br>
																	<center>
																	
																		<p style="font-size:16px;color:#2a2a2a;">
																		
																			Votre message a bien été lu par un membre du Staff.<br>Il vient d\'être traîter par un membre compétant et qui vous donne une réponse des plus fiables possibles.<br>Si vous n\'arrivez toujours pas à résoudre le problème (si c\'en est un), alors merci de nous contacter via notre <a href="https://discord.gg/JNQzESy6Au">serveur Discord</a>.<br><br>
																			Ceci est un message du Staff ; '.$response.'
																			
																			<br><br><br>

																			Pour plus d\'informations sur Glowe, cliquez <a href="https://glowe.fr/?p=about">ici</a> !
																		
																		</p>

																	</center>

																	<br>

																</div>

															</section>
															<footer style="color:#2a2a2a;font-family:\'Arial\';background-color:#d6dbdf;margin-top:-0.5em;">
																<center>

																	<br>

																	<h5>Glowe Inc. Service d\'hébergement de fichiers<br>Administré et éditer par Clément Menguy domicilé au 8 Hameau de Kerguily, 29170 Pleuven.<br>Ce message a été envoyer par une adresse mail incapable de recevoir des e-mails, merci de ne pas y répondre.</h5>

																	<br>

																</center>
															</footer>
														</body>
														</html>
													
													';

													$headers[] = 'MIME-Version: 1.0';
													$headers[] = 'Content-type: text/html; charset=utf-8';
													$headers[] = 'From: no-reply@glowe.fr'.'\r\n'.'Reply-To: clement.mnguy@outlook.fr'.'\r\n'.'X-Mailer: PHP/'.phpversion();

													mail($to,$subject, $message, implode("\r\n", $headers));
												
												}

											?>

											<form method="post" id="regForm">

												<label style="font-family:'Arial';position:relative;margin:0;display:block;line-height:16px;font-size:14px;font-weight:400;float:left;" for="response">Réponse:</label>
												<textarea type="text" name="response" id="response" style="width:420px;height:173px;"></textarea>

												<br>

												<p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
												<button type="submit" name="response_message" id="button-rep-2">Répondre</button>

												<style type="text/css">
															
													#button-rep-2
													{
														background-color:#c82020;
														border:2px solid #c82020;
														display:block;
														width:97%;
														height:36px;
														color:#fff;
														border-radius:2px;
														cursor:pointer;
														font-size:16px;
														margin:5px 0;
														outline:none;
														transition: 0.7s;
													}

													#button-rep-2:hover
													{
														background:#fff;
														border:#fff;
														color:#3c3c3c;
														transition: 0.8s;
													}

												</style>

											</form>

											<br>

										</div>

									</aside>

								<?php

							endwhile;
						}

					}
				?>

			</center>

		</div>

	</section>

	<?php

	}else {

	?>

		<section>
		
		<div id="panel-div-stockage">

			<br><br>

			<center>

				<h2 style="color: #3f3f3f;">Accès <font color="red">Refusé</font></font></h2>

				<p id="p1" style="color: #3f3f3f;">Cette page est reservée au Staff du site Glowe.</p>

				<img src="./img/acces-refuse.png">

			</center>

		</div>

	</section>

	<?php

	}

?>