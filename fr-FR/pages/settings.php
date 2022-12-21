<?php 
	if(isLogged() == 0){
        header("Location:index.php?p=login");
    }

?>

<section>

	<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

		<div style="height: 4.5em; width: 100%; float: right; margin-left: 0.005em; background-color: #606060; margin-top: 3.8em; position: fixed;">
				
			<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="projects/hébergeur/?p=stockage-panel" id="link-panel">Retour</a></button>

			<center><h2 style="margin-left: 2em; margin-top: -1.2em;">7 Go de Stockage</h2></center>

		</div>

		<?php
					
			if(isset($_POST['submit']) && $token == $_SESSION['token'] && $token != ""){

				if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
				{
					$secret = '0x24E600B10A1B9Df42E5678ee6807C856f0322e03';
					$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
					$responseData = json_decode($verifyResponse);
					if($responseData->success)
					{

						$name = htmlspecialchars(trim($_POST['name']));       
						$password = sha1(htmlspecialchars(trim($_POST['password'])));

						if(pseudo_taken($name) == 1) {

							$error = "Ce pseudo est déjà utilisée...";

						}else{

							/* Petit bout de code permettant de créer un dossier */

							$id = $name;
						
							/* On vérifie si le dossier existe déjà */

							$folder = "projects/hébergeur/pages/upload/" . $id . "/";

							rename("projects/hébergeur/pages/upload/" . $_SESSION['name'] . "/", $folder);
								
							modify($name, $password);
							$_SESSION['u610518065_test'] = $name;
							header("Location:?p=profil");

						}

						$found;

						if ($found = true){
						$_SESSION['name'] = $name;
						}

						if ($found = true){
						$_SESSION['password'] = $password;
						}
                
					} 
					else {
						$error = "Le hCaptcha n'est pas valide.";
					}
				}
						
			}

		?>

	<div class="container">
		<div class="left">
			<div class="header">
				<h2 class="animation a1">Vous voulez modifier quelque chose?</h2>
				<h4 class="animation a2">Vous pouvez modifier votre pseudo et votre mot de passe</h4>
			</div>
			<form method="post">
				<div class="form">
					<input type="text" name="name" class="form-field animation a3" value="<?php echo $_SESSION['name'];?>" required>
					<input type="email" name="email" class="form-field animation a4" style="color:#c6c6c6;" value="<?php echo $_SESSION['email'];?>" disabled>
					<input type="password" name="password" class="form-field animation a5" placeholder="Password" required>
					<br>
					<p class="error animation a5"><?php echo (isset($error)) ? $error : ''; ?></p><br>
					<div class="h-captcha animation a6" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>
					<button class="animation a6" type="submit" name="submit">MODIFIER</button>
				</div>
			</form><br>
			<button id="button-delete-account" href="#delete" class="js-modal animation a7">SUPPRIMER LE COMPTE</button>
			</div>
		<div class="right"></div>
	</div>

	<!-- -------------------------------------------------------------------------------------------------------------------------- -->

	<aside id="delete" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

		<div class="modal-wrapper js-modal-stop">

			<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

			<br><br>

			<?php

				if (isset($_POST['remove']) && $token == $_SESSION['token'] && $token != "") {

					if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
					{
						$secret = '0x24E600B10A1B9Df42E5678ee6807C856f0322e03';
						$verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
						$responseData = json_decode($verifyResponse);
						if($responseData->success)
						{
							
							function delete($email){
								global $db;
								$r = array(
									'email'=>$email
								);
								$sql = "DELETE FROM users WHERE email=:email";
								$req = $db->prepare($sql);
								$req->execute($r);
							}

							$email = $_SESSION['email'];

							delete($email);
							session_destroy();
							session_unset();
							
							?>
							
							<meta http-equiv="refresh" content="0; url=https://glowe.fr/fr-FR/?p=login">
							
							<?php

						} 
						else {
							$error = "Le hCaptcha n'est pas valide.";
						}
					}

				}	

			?>

			<center>
					
				<form method="post" enctype="multipart/form-data" class="form-upload">

					<p style="color: black; font-family: 'Lato';">Cette action est irréversible. Pour confirmer la suppression de votre compte merci de cliquer sur ce bouton.</p><br><br>

					<div class="h-captcha" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>

					<button type="submit" name="remove" id="button-delete-account">SUPPRIMER</button>

				</form>

			</center>

		</div>

	</aside>

</section>

<script src="https://js.hcaptcha.com/1/api.js?hl=fr" async defer></script>