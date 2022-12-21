
<!--  Main PHP Codes

**************************
	 Made by Climoux

  Glowe - Files Hosting
**************************
-->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Glowe Inc. is a platform that offers various free services, free file hosting and social media.">
	<meta name="keywords" content="hébergeur, gratuit, free, host, hosting, free host, free hosting, hébergement gratuit, hébergeur gratuit, sécurité, security, rapide, fast, services, online, en ligne, application, french, français, glowe, glow">
	<meta property="og:image" content="https://glowe.fr/fr-FR/img/gloweLogo.png">
	<link href="https://glowe.fr/fr-FR/css/fonts/fonts.css" rel="stylesheet">
	<link rel="icon" href="https://glowe.fr/fr-FR/img/standard.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/anim.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/bootstrap-responsive.css">
	<title>Glowe Inc. - Hébergement, Chawe. C'est simple, rapide et efficace</title>
</head>
<body>

	<?php

		include '../functions/main-functions.php';

		if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
			$keyword = $_GET['keyword'];
		}else{
		}
		
		$currentYear = date("Y");

	?>

	<section id="section-nav-panel">

		<!-- Classique Menu -->
		<nav role="navigation" id="topnav_menu">

			<a href="../index.php"><img src="../img/GloweHF.png" alt="GloweLogoNavBar" name="Glowe" id="glowe-icon"></a>

			<ul>

				<?php

				if(isLogged() == 1) {

					?>

						<li><a href="../index.php?p=logout"><button id="btn-deco">Déconnexion</button></a></li>

						<li><a href="../index.php?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a></li>

					<?php

				}else{

					?>

						<li><a href="../index.php?p=registration"><button id="btn-registration">S'inscrire</button></a></li>

						<li><a href="../index.php?p=signin"><button id="btn-signin">Connexion</button></a></li>

				<?php
				}

			?>

			    <li><a href="../projects/chawe/">Chawe</a></li>
			    <li><a href="../projects/monip/">MonIP</a></li>
			    <li><a href="../projects/hébergeur/">Hébergement</a></li>
				<li><a href="../index.php?p=home">Accueil</a></li>

			</ul>

		</nav>

		<a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
	      <!-- Some spans to act as a hamburger -->
	      <span></span>
	      <span></span>
	      <span></span>
	    </a>

        <!-- Responsive Menu -->
        <nav role="navigation" id="topnav_responsive_menu">
            
        	<ul>

			<li><a href="../projects/chawe/" id="home-link">Chawe</a></li>
		    <li><a href="../projects/monip/" id="home-link">MonIP</a></li>
			<li><a href="../projects/hébergeur/" id="home-link">Hébergement</a></li>
			<li><a href="../index.php" id="home-link">Accueil</a></li>

			<?php

				if(isLogged() == 1) {

					?>

						<li><a href="../index.php?p=logout"><button id="btn-deco">Déconnexion</button></a></li>

						<li><a href="../index.php?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a></li>

					<?php

				}else{

					?>

						<li><a href="../index.php?p=registration"><button id="btn-registration">S'inscrire</button></a></li>

						<li><a href="../index.php?p=signin"><button id="btn-signin">Connexion</button></a></li>

				<?php
				}

			?>

			</ul>

        </nav>

	</section>

	<?php 
	
		if ($keyword == "support" || $keyword == "modérateurs" || $keyword == "gérant marketing" || $keyword == "chef modérateur") {
	
	?>

		<section>

			<div id="home-background-page">	

				<br><br><br><br>

				<center>

					<h1 id="h1-title"><font color="white">Recrutements <?php echo $keyword; ?></font></h1>

					<h3><font color="white">Les questions notées d'un « <font color="red">*</font> » sont obligatoires</font></h3>

					<br><br>

					<div id="rectangle-div-registration">

						<h2>Informations personnelles</h2>

						<br>
						
						<?php
						
							if(isset($_POST['submit'])){
								
								$name = htmlspecialchars(trim($_POST['name']));
								$surname = htmlspecialchars(trim($_POST['surname']));
								$email = htmlspecialchars(trim($_POST['email']));
								$age = htmlspecialchars(trim($_POST['age']));
								$tel = htmlspecialchars(trim($_POST['telNum']));
								$why = htmlspecialchars(trim($_POST['why']));
								$why_this = htmlspecialchars(trim($_POST['why_this']));
								$why_you = htmlspecialchars(trim($_POST['why_you']));
								$pseudo = htmlspecialchars(trim($_POST['pseudo']));
								$role = ucfirst($keyword);

								function postuler($name, $surname, $email, $age, $tel, $why, $why_this, $why_you, $pseudo, $role)
								{
									global $db;
									$r = array(
										'name'=>$name,
										'surname'=>$surname,
										'email'=>$email,
										'age'=>$age,
										'tel'=>$tel,
										'why'=>$why,
										'why_this'=>$why_this,
										'why_you'=>$why_you,
										'pseudo'=>$pseudo,
										'role'=>$role
									);
									$sql = "INSERT INTO recruitment(name,surname,age,email,tel,why,why_this,why_you,pseudo,role) VALUES(:name,:surname,:age,:email,:tel,:why,:why_this,:why_you,:pseudo,:role)";
									$req = $db->prepare($sql);
									$req->execute($r);
								}

								postuler($name, $surname, $email, $age, $tel, $why, $why_this, $why_you, $pseudo, $role);

							}

						?>

						<form method="post" id="regForm">

							<div class="field">
								<label class="field-label" for="name">Votre prénom <font color="red">*</font></label>
								<input class="field-input" type="text" name="name" id="name" required/>            
							</div>

							<div class="field">
								<label class="field-label" for="surname">Votre nom <font color="red">*</font></label>
								<input class="field-input" type="text" name="surname" id="surname" required/>
							</div>

							<div class="field">
								<label class="field-label" for="age">Votre âge <font color="red">*</font></label>
								<input class="field-input" type="text" name="age" id="age" style="text-transform:lowercase;" maxlength="3" required/>
							</div>

							<div class="field">
								<label class="field-label" for="email">Votre adresse mail <font color="red">*</font></label>
								<input class="field-input" type="email" name="email" id="email" required/>
							</div>

							<div class="field">
								<label class="field-label" for="telNum">Votre numéro de téléphone <font color="red">*</font></label>
								<input class="field-input" type="tel" name="telNum" id="telNum" style="text-transform:lowercase;" maxlength="10" required />
							</div>

							<br>

							<h2>Questions</h2>

							<br>

							<div class="field">
								<label class="field-label" for="why">Pourquoi avoir choisi Glowe ? <font color="red">*</font></label>
								<input class="field-input" type="text" name="why" id="why" required/>
							</div>

							<div class="field">
								<label class="field-label" for="why_this">Pourquoi devenir <?php echo $keyword; ?> ? <font color="red">*</font></label>
								<input class="field-input" type="text" name="why_this" id="why_this" required/>
							</div>

							<div class="field">
								<label class="field-label" for="why_you">Pourquoi nous devrions vous choisir vous et pas un autre ? <font color="red">*</font></label>
								<input class="field-input" type="text" name="why_you" id="why_you" required/>
							</div>

							<div class="field">
								<label class="field-label" for="pseudo">Avez-vous Discord ? Si oui mettez votre pseudo de cette manière : pseudo#xxxx <font color="red">*</font></label>
								<input class="field-input" type="text" name="pseudo" id="pseudo" required/>            
							</div>
							
							<br>

							<button type="submit" name="submit" id="button-register">Postuler</button>

						</form>

					</div>

				</center>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			</div>

		</section>

	<?php
	
		}else {

	?>

		<section>
			
			<div id="panel-div-stockage" style="min-height:100vh;height:auto;">

				<center><br><br><br><br><br>
				
					<h1 style="color:#2a2a2a;">URL non valide</h1>

				</center>

			</div>

		</section>

	<?php

		}
	
	?>

	<footer>

		<center>

			<div id="div-footer-secu-text">
				<br>
					<h3 style="color: white; font-size: 18px;">Sécurité :</h3>
					<h4><a href="?p=cgu" style="font-size:14px;">Conditions d’Utilisation</a></h4>
					<h4><a href="?p=rules" style="font-size:14px;">Règlement</a></h4>
					<h4><a href="?p=mod" class="js-modal" style="font-size:14px;">Modération</a></h4>
				<br>
			</div>

			<div id="div-footer-glowe-text">
				<br>
					<h3 style="color: white; font-size: 18px;">Glowe :</h3>
					<h4><a href="?p=about&c=glowe" style="font-size:14px;">À Propos du Site</a></h4>
					<h4><a href="https://glowe.fr/fr-FR/projects/hébergeur/index.php?p=stockage-panel" style="font-size:14px;">Uploader un Fichier</a></h4>
					<h4><a href="#contact" class="js-modal" style="font-size:14px;">Nous contacter</a></h4>
					<h4><a href="https://discord.gg/JNQzESy6Au" target="about:blank" rel="noopener noreferrer" style="font-size:14px;">Discord</a></h4>
				<br>
			</div>

			<div id="div-footer-recruts-text">
				<br>
					<h3 style="color: white; font-size: 18px;">Travailler avec Glowe :</h3>
					<h4><a href="?p=about&c=work" style="font-size:14px;">À Propos</a></h4>
					<h4><a href="?p=recruitment" style="font-size:14px;">Recrutements</a></h4>
					<h4><a href="?p=actus" class="js-modal" style="font-size:14px;">Actualités</a></h4>
				<br>
			</div>

			<br><br><br>

			<div id="header_linear"><div id="linear"></div></div><br>
		
		</center>

		<img src="https://glowe.fr/fr-FR/img/gloweFooter.png" alt="logo footer" name="logo" id="glowe-img-footer">

		<center>

			<br><br>

			<small style="font-family: 'Ubuntu'; color: white;">&copy; Copyright <?php echo $currentYear; ?>, Glowe Inc.</small>

		</center>

		<form method="post" action="https://glowe.fr/app/Glowe_Setup.exe">

			<input type="submit" name="download" id="download-text-footer" value="Télécharger pour Windows">
		
		</form>

	</footer>

	<aside id="contact" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

		<div class="modal-wrapper js-modal-stop">

			<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

			<br><br>
    
	    	<?php 
				if(isLogged() == 1) {

				?> 
				
					<center><h1>Pour contacter Glowe merci de remplir ce formulaire.</h1></center>

				<?php

				}else{
				
				?>

					<center><h1>Vous devez être <a href="../index.php?p=registration" id="hypertext-link-registration-modal">inscrit</a> sur le site afin de contacter Glowe</h1></center>

				<?php

				}
				
				/* ------------------------------------------------ */

		        if(isset($_POST['submit'])){

		            $membre = htmlspecialchars(trim($_POST['email']));
		            $name = htmlspecialchars(trim($_POST['name']));
					$msg = htmlspecialchars(trim($_POST['msg']));
					
					function contact($name, $membre, $msg){
						global $db;
						$r = array(
							'sender'=>$membre,
							'name'=>$name,
							'message'=>$msg
						);
						$sql = "INSERT INTO contact(sender,name,message,date) VALUES(:sender,:name,:message,NOW())";
						$req = $db->prepare($sql);
						$req->execute($r);
					}
		            
					contact($name, $membre, $msg);
		            $_SESSION['test'] = $membre;
					

		        }

    		?>

	    	<form method="post" id="regForm">

				<div class="contact-field">
		            <label class="contact-field-label" for="name">Votre nom</label>
		            <input class="contact-field-input" type="text" name="name" id="name"/>
		        </div>

		        <div class="contact-field">
		            <label class="contact-field-label" for="email">Votre adresse email</label>
		            <input class="contact-field-input" type="email" name="email" id="email"/>
		        </div>

		        <div class="contact-field">
		            <label class="contact-field-label" for="msg">Votre message</label>
		            <input class="contact-field-input" type="text" name="msg" id="msg"/>
		        </div>

		        <br>

		        <p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
		        <button type="submit" name="submit" <?php if(isLogged() == 1){ echo 'id="btn-staff"'; }else{ echo 'id="btn-staff-disabled" disabled'; } ?>>Envoyer au Staff</button>

		    </form>

		    <br>

		</div>

	</aside>

	<script src="../js/popup.js" type="text/javascript"></script>
	<script src="../js/nav-responsive.js" type="text/javascript"></script>

	<!--Start of jQuery Script-->
	<script src="../js/jquery.js"></script>
	<!--End of jQuery Script-->

</body>
</html>