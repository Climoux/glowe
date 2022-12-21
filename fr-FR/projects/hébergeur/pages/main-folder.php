<?php

	if (file_exists('pages/visibility/save/'.sha1($f).'/' . $f . '-folder.php')) {
			
		$dir_nom_2 = "pages/upload/" . sha1($f) . "/" . $folder . "/";

?>

	<section>
			
		<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

			<br><div id="stockage-panel-div-menu">

				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="index.php?p=browse" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">Dossier Publique de <?php echo $f; ?>, dossier <?php echo $folder; ?></h2></center>
					
				<img src="./img/dl-zip.png" alt="DLZIP" name="Download" style="margin-left:115em;margin-top:-3em;position:absolute;" href="#dl" class="js-modal"></img> 

			</div>

			<br><br><br><br><br>
				
			<?php

				include 'visibility/save/'.sha1($f).'/'.$f.'-folder.php';

			?>

		</div>

	</section>

	<aside id="dl" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

		<div class="modal-wrapper js-modal-stop">

			<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

			<br><br>
			
			<?php

    			if(isLogged() == 1) {
    				$user = $_SESSION['name_crypted'];
    			} else {
    			    $user = "Anonymous";
    			}
    					
    		?>

			<form method="post" class="form-upload" enctype="multipart/form-data" action="pages/upload/tmp/<?php echo $user."/".$f."_".$folder.".zip"; 
				
				if(file_exists('pages/upload/tmp/'.$user.'/'.$f."_".$folder.'.zip')) { 
						
				}else{

					$zip_name = $f."_".$folder.".zip";
					$zip = new ZipArchive;
					$dirname = "pages/upload/".sha1($f)."/".$folder."/";
					$path = "pages/upload/tmp/readme/";
						
					if($zip->open("pages/upload/tmp/".$user."/".$zip_name, ZipArchive::CREATE ) === TRUE)
					{
						$dir = opendir($dirname);
						$path_read = opendir($path);

						while($fichier = readdir($dir)) 
						{
							if(is_file($dirname.$fichier)) 
							{
							    if (strpos($fichier, ".txt")) {
							        $file = str_replace(".txt", "", $fichier);
							        $zip->addFile($dirname.$fichier, $file);
							    }
							}
						}

						// -------------------------------------------------------- //

						while($readme = readdir($path_read)) 
						{
							if(is_file($path.$readme)) 
							{
								$zip->addFile($path.$readme, $readme); 
							}
						}

						// -------------------------------------------------------- //

						$zip->close();							
					}

				}?>">

				<button type="submit" name="submit" id="button-upload">Télécharger</button>

			</form>

		</div>

	</aside>

<?php

	}else{

?>

	<section>
			
		<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

			<center><br><br><br><br><br>
			
				<h1 style="color: #2a2a2a;">Dossier non disponible.</h1>

			</center>

		</div>

	</section>

<?php

	}

?>