<?php

	if(isLogged() == 0){
        header("Location:../../index.php?p=signin");
    }

    $password = $_SESSION['password'];

    if ($_SESSION['password'] == 'StaffGloweHF') {

	?>

	<section>
		
		<div id="panel-div">

			<br><br>

			<center>

				<h2 style="color: #3f3f3f;">Accès <font color="red">Refusé</font></font></h2>

				<p id="p1" style="color: #3f3f3f;">Vous êtes actuellement connecté sur le compte Staff, vous dévez avoir un compte Utilisateur pour pouvoir accès à ce panel</p>

				<img src="./img/acces-refuse.png">

			</center>

		</div>

	</section>

	<?php

	}else {

	?>

	<section>

		<div style="height: auto; background-color: #fff; min-height: 60em;">

			<br>

			<div id="stockage-panel-div-menu">
				
				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="?p=files" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">7 Go de Stockage</h2></center>

			</div>

		<?php 

			if(isset($_POST['submit'])){

				$folder_a = htmlspecialchars(trim($_POST['folder_a']));

				if (file_exists("pages/upload/" . $_SESSION['name_crypted'] . "/" . $folder_a . "/")) {

				}else{

					mkdir("pages/upload/" . $_SESSION['name_crypted'] . "/" . $folder_a . "/");

					header("Location:index.php?p=files&token=". $_SESSION['token']);

				}	

			    $found;

			    if ($found = true) {
					$_SESSION['folder'] = $_POST['folder_a'];
			    }
			           
			}

		?>

		<form method="post" id="textForm" style="margin-left: 2.5em; margin-top: 25em;">

			<div class="field">
				<label class="field-label" for="folder_a" style="color: #2a2a2a;">Nom du dossier</label>
				<input class="field-input" type="text" name="folder_a" id="folder_a" required="true" style="color: #2a2a2a;" />      
			</div>

			<button type="submit" name="submit" id="button-create">Créer</button>

		</form>

		</div>

	</section>

	<?php

	}

?>