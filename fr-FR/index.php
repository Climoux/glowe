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
	<link href="css/fonts/fonts.css" rel="stylesheet">
	<link rel="icon" href="https://glowe.fr/fr-FR/img/standard.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/anim.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/bootstrap-responsive.css">
	<title>Glowe Inc. - Hébergement, Chawe. C'est simple, rapide et efficace</title>
</head>
<body onload="document.location = '#'">

	<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

	<?php

		include 'functions/main-functions.php';

		$pages = scandir('pages/');

		if(isset($_GET['p']) && !empty($_GET['p']) && in_array($_GET['p'].'.php',$pages)){
			$p = $_GET['p'];
		}else{
			$p = 'home';
		}

		if(isset($_GET['type']) && !empty($_GET['type'])){
			$type = $_GET['type'];
		}else{
			$type = '';
		}

		if(isset($_GET['user']) && !empty($_GET['user'])){
			$user = $_GET['user'];
		}else{
		    $user = '';
		}

		if(isset($_GET['token']) && !empty($_GET['token'])){
			$token = $_GET['token'];
		}else{
		    $token = '';
		}

		if(isset($_GET['key']) && !empty($_GET['key'])){
			$key = $_GET['key'];
		}else{
		    $key = '';
		}

		if(isset($_GET['act']) && !empty($_GET['act'])){
			$act = $_GET['act'];
		}else{
		    $act = '';
		}

		if(isset($_GET['c']) && !empty($_GET['c'])){
			$content = $_GET['c'];
		}else{
		    $content = '';
		}

		$pages_functions = scandir('functions/');

		if(in_array($p.'.func.php',$pages_functions)){
			include 'functions/'.$p.'.func.php';
		}

		$currentYear = date("Y");

	if ($p == "settings" || $p == "panel" || $p == "panel-actus" || $p == "panel-recrut" || $p == "panel-msg" || $p == "users-list") {
	?>

	<section id="section-nav-panel_otherspages">
		
		<div id="topnav_menu">

			<a href="https://glowe.fr/fr-FR/"><img src="https://glowe.fr/fr-FR/img/gloweLogo.png" width="50" heigth="50" alt="logo" name="logo"></a>

			<div id="link-div-menu">
				<a href="?p=home" id="home-link">Accueil</a>
				<a href="https://glowe.fr/fr-FR/projects/hébergeur/" id="home-link">Hébergement</a>
				<a href="https://glowe.fr/fr-FR/projects/chawe/" id="home-link">Chawe</a>
			</div>

			<div id="btn-div-menu">

				<?php

					if(isLogged() == 1) {

					?>

						<a href="?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a>

						<a href="?p=logout"><button id="btn-deco">Déconnexion</button></a>

					<?php

					}else{

					?>

						<a href="?p=login"><button id="btn-signin">Connexion</button></a>

						<a href="?p=signup"><button id="btn-registration">S'inscrire</button></a>

					<?php
					}

				?>

			</div>

		</div>

		<a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
	      <!-- Some spans to act as a hamburger -->
	      <span></span>
	      <span></span>
	      <span></span>
	    </a>

        <!-- Responsive Menu -->
        <nav role="navigation" id="topnav_responsive_menu">
            
        	<ul>

			<li><a href="?p=home" id="home-link">Accueil</a></li>
			<li><a href="https://glowe.fr/fr-FR/projects/hébergeur/" id="home-link">Hébergement</a></li>
			<li><a href="https://glowe.fr/fr-FR/projects/chawe/" id="home-link">Chawe</a></li>

			<?php

				if(isLogged() == 1) {

					?>

						<li><a href="?p=logout"><button id="btn-deco">Déconnexion</button></a></li>

						<li><a href="?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a></li>

					<?php

				}else{

					?>

						<li><a href="?p=registration"><button id="btn-registration">S'inscrire</button></a></li>

						<li><a href="?p=signin"><button id="btn-signin">Connexion</button></a></li>

				<?php
				}

			?>

			</ul>

        </nav>

	</section>

	<?php	
	} else {
	?>

	<section id="section-nav-panel">
		
		<div id="topnav_menu">

			<a href="https://glowe.fr/fr-FR/"><img src="https://glowe.fr/fr-FR/img/gloweLogo.png" width="50" heigth="50" alt="logo" name="logo"></a>

			<div id="link-div-menu">
				<a href="?p=home" id="home-link">Accueil</a>
				<a href="https://glowe.fr/fr-FR/projects/hébergeur/" id="home-link">Hébergement</a>
				<a href="https://glowe.fr/fr-FR/projects/chawe/" id="home-link">Chawe</a>
			</div>

			<div id="btn-div-menu">

				<?php

					if(isLogged() == 1) {

					?>

						<a href="?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a>

						<a href="?p=logout"><button id="btn-deco">Déconnexion</button></a>

					<?php

					}else{

					?>

						<a href="?p=login"><button id="btn-signin">Connexion</button></a>

						<a href="?p=signup"><button id="btn-registration">S'inscrire</button></a>

					<?php
					}

				?>

			</div>

		</div>

		<a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
	      <!-- Some spans to act as a hamburger -->
	      <span></span>
	      <span></span>
	      <span></span>
	    </a>

        <!-- Responsive Menu -->
        <nav role="navigation" id="topnav_responsive_menu">
            
        	<ul>

			<li><a href="?p=home" id="home-link">Accueil</a></li>
			<li><a href="https://glowe.fr/fr-FR/projects/hébergeur/" id="home-link">Hébergement</a></li>
			<li><a href="https://glowe.fr/fr-FR/projects/chawe/" id="home-link">Chawe</a></li>

			<?php

				if(isLogged() == 1) {

					?>

						<li><a href="?p=logout"><button id="btn-deco">Déconnexion</button></a></li>

						<li><a href="?p=profil"><button id="btn-profil"><?php echo $_SESSION['name']; ?></button></a></li>

					<?php

				}else{

					?>

						<li><a href="?p=registration"><button id="btn-registration">S'inscrire</button></a></li>

						<li><a href="?p=signin"><button id="btn-signin">Connexion</button></a></li>

				<?php
				}

			?>

			</ul>

        </nav>

	</section>

	<?php
	}

		include 'pages/'.$p.'.php';

		if ($p == "settings" || $p == "signup" || $p == "login") {

			// Rien

		} else {

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
					<h4><a href="https://discord.gg/pPDAJECP9d" target="about:blank" rel="noopener noreferrer" style="font-size:14px;">Discord</a></h4>
				<br>
			</div>

			<div id="div-footer-recruts-text">
				<br>
					<h3 style="color: white; font-size: 18px;">Travailler avec Glowe :</h3>
					<h4><a href="?p=about&c=work" style="font-size:14px;">À Propos</a></h4>
					<h4><a href="?p=recruitment" style="font-size:14px;">Recrutements</a></h4>
					<h4><a href="?p=actus" style="font-size:14px;">Actualités</a></h4>
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
				
					<center><h1>Pour contacter Glowe, veuillez remplir ce formulaire.</h1></center>

				<?php

				}else{
				
				?>

					<center><h1>Vous devez être <a href="?p=signup" id="hypertext-link-registration-modal">inscrit</a> sur le site pour contacter Glowe</h1></center>

				<?php

				}
				
				/* ------------------------------------------------ */

		        if(isset($_POST['submit_contact'])){

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
		        <button type="submit" name="submit_contact" <?php if(isLogged() == 1){ echo 'id="btn-staff"'; }else{ echo 'id="btn-staff-disabled" disabled'; } ?>>Envoyer au Staff</button>

		    </form>

		    <br>

		</div>

	</aside>

	<?php
	
		}
	
	?>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://glowe.fr/fr-FR/js/popup.js" type="text/javascript"></script>
	<script src="https://glowe.fr/fr-FR/js/nav-responsive.js" type="text/javascript"></script>
	<script src="https://glowe.fr/fr-FR/js/scroll.js" type="text/javascript"></script>

	<!--Start of jQuery Script-->
	<script src="https://glowe.fr/fr-FR/js/jquery.js"></script>
		<?php
			$pages_js = scandir('js/');
			if(in_array($p.'.func.js',$pages_js)){
				?>
					<script src="https://glowe.fr/fr-FR/js/<?= $p ?>.func.js"></script>
				<?php
			}

		?>
	<!--End of jQuery Script-->

</body>
</html>