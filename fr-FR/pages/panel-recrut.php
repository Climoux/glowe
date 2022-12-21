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

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Réponses Reçues</h2></center>

			</div>

			<br><br><br><br><br><br><br><br>

			<center>
				
				<?php

					foreach(sender() as $msg){
						if($msg->email != $_SESSION['test']){

                            $tel = wordwrap($msg->tel, 2, ' ', true)

				?>

					<div class="msg">
                        <h1 style="color:white">Informations personnelles</h1>
						<span>Prénom : <?= $msg->name ?></span><br/>
						<span>Nom : <?= $msg->surname ?></span><br/>
                        <span>Âge : <?= $msg->age ?> ans</span><br/>
						<span>Email : <?= $msg->email ?></span><br/>
                        <span>Téléphone : <?= $tel ?></span><br/>
                        <h1 style="color:white">Questions</h1>
						<span>Pourquoi : <?= $msg->why ?></span><br/>
                        <span>Pourquoi ceci : <?= $msg->why_this ?></span><br/>
                        <span>Pourquoi vous : <?= $msg->why_you ?></span><br/>
						<span>Pseudo : <?= $msg->pseudo ?></span><br/>
                        <span>Rôle : <?= $msg->role ?></span><br/><br>
					</div>

				<?php
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