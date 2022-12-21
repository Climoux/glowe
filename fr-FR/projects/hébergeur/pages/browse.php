<section>

    <div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

        <?php

			/* On set l'UTF-8 */

			setlocale(LC_ALL,'fr_FR.UTF-8');

			/* On set les variables */

			$dir_nom = "pages/visibility/";
			$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas');
			$fichier= array();
			$dossier= array();

			/* Compte les fichiers */

			$file = glob($dir_nom . '/*.php');
			$count = count($file);

            /* ------------------------------------------------------------------ */

            ?>

				<br>

                <div id="stockage-panel-div-menu">

                    <center><h2 style="margin-left: 2em;">Parcourir les Dossiers Publiques (<?php echo $count; ?> dossiers)</h2></center>

                </div>

                <br><br><br><br><br>

            <?php

			/* ------------------------------------------------------------------ */

			while($element = readdir($dir)) {
				if($element != '.' && $element != '..') {
					if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
					else {$dossier[] = $element;}
				}
			}

			closedir($dir);

			if(!empty($fichier)){
				sort($fichier);

				foreach($fichier as $lien) {
					
                    /* ------------ Récupération de l'extension du fichier ------------- */

					$info = $dir_nom . '/' . $lien;

					$ext = pathinfo($info);

                    /* ----------------------------- Suppression ----------------------------- */

                    $infosprext = strpos($lien, '.');

                    $sprext = substr($lien, 0, $infosprext);

					/* ------------------ Mise en place de la détéction ----------------- */

					if ($ext['extension'] == 'php') {

						if ($lien != "index.php") {
						    
						    echo '<a href="?p=main&f=' . $sprext . '" style="color: #494949;"><img src="./img/files.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $sprext .'</a>';
						    
						}

                    }

				}

			}

		?>

    </div>

</section>