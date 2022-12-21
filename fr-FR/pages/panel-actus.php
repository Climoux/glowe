<?php 
	if(isLogged() == 0){
        header("Location:index.php?p=login");
    }

    // Fonctions

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }
    
    function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    // END fonctions

  	$filename = 'pages/admins.log';
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
            
	if (str_contains($contents, hash('sha256', getIp())) && str_contains($contents, hash('sha256', $_SESSION['email'])) && $act != "edit" && $act != "add") {

?>

	<section>
		
		<div id="panel-div-stockage">

			<div style="height: 4.5em; width: 100%; float: right; margin-left: 0.005em; background-color: #606060; margin-top: 3.8em; position: fixed;">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=panel" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Actualités</h2></center>

				<button id="btn-access" style="float: right; margin-right: 2em; margin-top: -2.3em;"><a href="?p=panel-actus&act=add&token=<?= $_SESSION['token'] ?>" id="link-panel">Ajouter</a></button>

			</div>

			<br><br><br><br><br><br><br><br>

			<center>
				
				<?php

					foreach(actus() as $actus){

						$sql = "SELECT * FROM `actus` WHERE `name`='$actus->name'";
                                                
						$stmt = $db->query($sql);
															
						if($stmt == false){
							die("Erreur");
						}
										
						/* --------------------------------------------- */
								
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

							if ($act == "delete" && $act != "" && $token == $_SESSION['token'] && $token != "") {

								function delete($id){
									global $db;
									$r = array(
										'id'=>$id
									);
									$sql = "DELETE FROM actus WHERE id=:id";
									$req = $db->prepare($sql);
									$req->execute($r);
								}

								$id = $row['id'];

								delete($id);
								header("Location:?p=panel-actus&token=".$_SESSION['token']);

							}

						endwhile;

						if ($actus->name == "rzqr") {

                    	} else {
				?>

                        	<div class="msg">
                        		<span>Ajouter par <?= $actus->name ?> le <?= $actus->date ?></span><br/>
                         		<span><?= $actus->content ?></span><br/>
                        	</div><br><br>

				<?php
                    	}
                    }
				?>

			</center>

		</div>

	</section>

	<?php

	}elseif (str_contains($contents, hash('sha256', getIp())) && str_contains($contents, hash('sha256', $_SESSION['email'])) && $act == "edit") {

	?>

	<section>
		
		<div id="panel-div-stockage">

			<div style="height: 4.5em; width: 100%; float: right; margin-left: 0.005em; background-color: #606060; margin-top: 3.8em; position: fixed;">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=panel" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Actualités</h2></center>

			</div>

			<center>
				
				<?php

					foreach(actus() as $actus){
						if($actus->name != $_SESSION['u610518065_test']){

							$sql = "SELECT * FROM `actus` WHERE `name`='$actus->name'";
                                                
							$stmt = $db->query($sql);
															
							if($stmt == false){
								die("Erreur");
							}
										
							/* --------------------------------------------- */
								
							while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

								if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
								{
									$secret = '0x24E600B10A1B9Df42E5678ee6807C856f0322e03';
									$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
									$responseData = json_decode($verifyResponse);
									if($responseData->success)
									{

										if (isset($_POST['submit']) && $token == $_SESSION['token'] && $token != "") {

											setlocale(LC_TIME, "fr_FR");
											date_default_timezone_set("Europe/Paris");

											$content = htmlspecialchars(trim($_POST['content']));

											function edit($contents, $id){
												global $db;
												$r = array(
													'content'=>$contents,
													'date'=>strftime("%d/%m/%Y"),
													'id'=>$id
												);
												$sql = "UPDATE actus SET content=:content, date=:date WHERE id=:id";
												$req = $db->prepare($sql);
												$req->execute($r);
											}

											$id = $row['id'];

											edit($content, $id);

											?>
											
											<meta http-equiv="refresh" content="0;?p=panel-actus&token=<?= $_SESSION['token'] ?>">
											
											<?php
										}
								 	}
								}

							endwhile;

				?>
				
					<div class="container">
						<div class="left">
							<div class="header">
								<h2 class="animation a1">Vous voulez modifier quelque chose?</h2><br>
							</div>
							<form method="post">
								<div class="form">
									<input type="text" name="name" class="form-field animation a3" style="color:#c6c6c6;" value="<?php echo $actus->name; ?>" disabled>
									<textarea type="text" name="content" class="form-field animation a2" style="color:black;padding-top:10px;height:150px;"><?php echo $actus->content; ?></textarea>
									<br>
									<p class="error animation a5"><?php echo (isset($error)) ? $error : ''; ?></p><br>
									<div class="h-captcha animation a6" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>
									<button class="animation a6" type="submit" name="submit">MODIFIER</button>
								</div>
							</form><br>
							</div>
						<div class="right"></div>
					</div>

				<?php
					    }
                    }
				?>

			</center>

		</div>

	</section>
	
	<?php

	}elseif (str_contains($contents, hash('sha256', getIp())) && str_contains($contents, hash('sha256', $_SESSION['email'])) && $act == "add") {

	?>

	<section>
		
		<div id="panel-div-stockage">

			<div style="height: 4.5em; width: 100%; float: right; margin-left: 0.005em; background-color: #606060; margin-top: 3.8em; position: fixed;">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=panel" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Actualités</h2></center>

			</div>

			<center>
				
				<?php

					foreach(actus() as $actus){
						if($actus->name != $_SESSION['u610518065_test']){

							$sql = "SELECT * FROM `actus` WHERE `name`='$actus->name'";
                                                
							$stmt = $db->query($sql);
															
							if($stmt == false){
								die("Erreur");
							}
										
							/* --------------------------------------------- */
								
							while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

								if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
								{
									$secret = '0x24E600B10A1B9Df42E5678ee6807C856f0322e03';
									$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
									$responseData = json_decode($verifyResponse);
									if($responseData->success)
									{

										if (isset($_POST['submit']) && $token == $_SESSION['token'] && $token != "") {

											setlocale(LC_TIME, "fr_FR");
											date_default_timezone_set("Europe/Paris");

											$content = htmlspecialchars(trim($_POST['content']));

											function add($contents){
												global $db;
												$r = array(
													'content'=>$contents,
													'date'=>strftime("%d/%m/%Y"),
													'name'=>$_SESSION['name']
												);
												$sql = "INSERT INTO actus(name,content,date) VALUES(:name,:content,:date)";
												$req = $db->prepare($sql);
												$req->execute($r);
											}

											$id = $row['id'];

											add($content);

											?>
											
											<meta http-equiv="refresh" content="0;?p=panel-actus&token=<?= $_SESSION['token'] ?>">
											
											<?php
										}

									}
								}

							endwhile;

				?>
				
					<div class="container">
						<div class="left">
							<div class="header">
								<h2 class="animation a1">Vous souhaitez ajouter une actualité?</h2><br>
							</div>
							<form method="post">
								<div class="form">
									<input type="text" name="name" class="form-field animation a3" style="color:#c6c6c6;" value="<?php echo $_SESSION['name']; ?>" disabled>
									<textarea type="text" name="content" class="form-field animation a2" style="color:black;padding-top:10px;height:150px;"></textarea>
									<br>
									<p class="error animation a5"><?php echo (isset($error)) ? $error : ''; ?></p><br>
									<div class="h-captcha animation a6" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>
									<button class="animation a6" type="submit" name="submit">AJOUTER</button>
								</div>
							</form><br>
							</div>
						<div class="right"></div>
					</div>

				<?php
					    }
                    }
				?>

			</center>

		</div>

	</section>
	
	<script src="https://js.hcaptcha.com/1/api.js?hl=fr" async defer></script>
	
	<?php 
	
	}else {

	?>

		<section>
		
		<div id="panel-div-stockage">

			<br><br><br>

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