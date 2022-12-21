<?php 
	if(isLogged() == 0){
        header("Location:../../index.php?p=login");
    }
    
    if(isset($_GET['token']) && !empty($_GET['token'])){
		$token = $_GET['token'];
	}
	else {
		$token = 'NOT_VALID';
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

		<div id="panel-div-stockage" style="min-height: 100vh; height: auto;">

			<br>

			<div id="stockage-panel-div-menu">
				
				<button id="btn-access" style="margin-left: 2em; margin-top: 1em;"><a href="?p=stockage-panel" id="link-panel">Retour</a></button>

				<center><h2 style="margin-left: 2em; margin-top: -1.2em;">7 Go de Stockage</h2></center>

				<div id="OtherForm">

					<a href="?p=add-folder"><img src="./img/add-folder.png" alt="Folder" name="AddFolder" style="float: right; margin-right: 2em; margin-top: -2em;"></a>

					<div class="infobulle">
						
						<p>Ajouter un dossier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherFormMobile">

					<a href="?p=add-folder"><img src="./img/add-folder.png" alt="Folder" name="AddFolder" style="float: right; margin-right: 4em; margin-top: 1em;"></a>

					<div class="infobulle">
						
						<p>Ajouter un dossier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherForm">

					<img src="./img/delete-folder.png" alt="Folder" name="DeleteFolder" href="#folder_r" class="js-modal" style="float: right; margin-right: -2em; margin-top: -2.5em;">

					<div class="infobulle-d" style="margin-right: -4.2em;">
						
						<p>Supprimer un dossier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherFormMobile">

					<img src="./img/delete-folder.png" alt="Folder" name="DeleteFolder" href="#folder_r" class="js-modal" style="float: right; margin-right: -4.5em; margin-top: 1em;">

					<div class="infobulle-d" style="margin-right: -4.2em;">
						
						<p>Supprimer un dossier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherForm">

					<img src="./img/add-file.png" alt="File" name="AddFile" href="#files" class="js-modal" style="float: right; margin-right: -4.5em; margin-top: -2.5em;" width="24" height="24">

					<div class="infobulle" style="margin-right: -8em;">
							
						<p>Ajouter un fichier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherFormMobile">

					<img src="./img/add-file.png" alt="File" name="AddFile" href="#files" class="js-modal" style="float: right; margin-right: -6em; margin-top: 1em;" width="24" height="24">

					<div class="infobulle" style="margin-right: -8em;">
							
						<p>Ajouter un fichier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherForm">

					<img src="./img/delete-file.png" alt="File" name="DeleteFile" href="#files_r" class="js-modal" style="float: right; margin-right: -3em; margin-top: -2.5em;" width="24" height="24">

					<div class="infobulle-d" style="margin-right: -4.5em;">
								
						<p>Supprimer un fichier</p>

					</div>

				</div>

				<!-- ///////////////////////////////////////////////////////////////// -->

				<div id="OtherFormMobile">

					<img src="./img/delete-file.png" alt="File" name="DeleteFile" href="#files_r" class="js-modal" style="float: right; margin-right: -3em; margin-top: 1em;" width="24" height="24">

					<div class="infobulle-d" style="margin-right: -4.5em;">
								
						<p>Supprimer un fichier</p>

					</div>

				</div>

			</div>

			<!-- -------------------------------------------------------------------------------------------------------------------------- -->

			<aside id="folder_r" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

				<div class="modal-wrapper js-modal-stop">

					<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

					<br><br>

					<?php

						if(isset($_POST['submit_r'])){

							$folder_d = htmlspecialchars(trim($_POST['folder_d']));

							if (file_exists("pages/upload/" . $_SESSION['name_crypted'] . "/" . $folder_d . "/")) {

								if (!$_SESSION['token']) {
								    
								    // Nothing
								    
								} else {
								
							        if ($_SESSION['token'] == $token) {
							            
							            rmdir("pages/upload/" . $_SESSION['name_crypted'] . "/" . $folder_d . "/");

							        } else {
							            
							            // Nothing
							            
							        }

								}

							}else{

							}
			            
			            }

					?>

					<form method="post" id="textForm">

						<div class="field">
						    <label class="field-label" for="folder_d" style="color: #2a2a2a;">Nom du dossier</label>
						    <input class="field-input" type="text" name="folder_d" id="folder_d" required="true" style="color: #2a2a2a;" />          
						</div>

						<button type="submit" name="submit_r" id="button-delete">Supprimer</button>

					</form>

				</div>

			</aside>

			<!-- -------------------------------------------------------------------------------------------------------------------------- -->

			<aside id="files" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

				<div class="modal-wrapper js-modal-stop">

					<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

					<br><br>

					<?php

						if(isset($_POST['submit'])){

							if($_SERVER["REQUEST_METHOD"] == "POST"){

							if(isset($_FILES["files_a"]) && $_FILES["files_a"]["error"] == 0){
							    $filename = $_FILES["files_a"]["name"];
							    $filetype = $_FILES["files_a"]["type"];
							    $filesize = $_FILES["files_a"]["size"];

							    $maxsize = 256 * 1024 * 1024;
							    if($filesize > $maxsize) die();

							        /* Code de sécurité */

							        $filename = strtr($filename,
									    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
									    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 

									$filename = preg_replace('/([^.a-z0-9]+)/i', '-', $filename);

					                /* On vérifie si le fichier existe déjà */

					                if(file_exists("pages/upload/" . $_SESSION['name_crypted'] . "/" . $_FILES["files_a"]["name"])){
            				                        				            
                                    } else{

								        move_uploaded_file($_FILES["files_a"]["tmp_name"], "pages/upload/" . $_SESSION['name_crypted'] . "/" . $_FILES["files_a"]["name"] . ".txt");
								        								               
								    }

							    } else{

							    }

							} else{

							}
				           
				       	}

					?>

					<form method="post" enctype="multipart/form-data" class="form-upload">

						<input type="file" id="file-input" name="files_a" id="fileUpload"><br><br>

						<button type="submit" name="submit" id="button-upload">Upload</button>

					</form>

				</div>

			</aside>

			<!-- -------------------------------------------------------------------------------------------------------------------------- -->

			<aside id="files_r" class="modal" aria-hidden="true" aria-modal="false" style="display:none;">

				<div class="modal-wrapper js-modal-stop">

					<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

					<br><br>

					<?php

						if(isset($_POST['submit_r_f'])){

							$files_d = htmlspecialchars(trim($_POST['files_d']));

							if (file_exists("pages/upload/" . $_SESSION['name_crypted'] . "/" . $files_d)) {

								if (!$_SESSION['token']) {
								    
								    // Nothing
								    
								} else {
								    
								    if ($_SESSION['token'] == $token) {
								        
								        unlink("pages/upload/" . $_SESSION['name_crypted'] . "/" . $files_d);

								    } else {
								        
								        // Nothing
								        
								    }

								}

							}else{

							}
				            
				        }

					?>

					<form method="post" enctype="multipart/form-data" class="form-upload">

						<div class="field">
							<label class="field-label" for="files_d" style="color: #2a2a2a;">Nom du fichier et extension (.txt, etc...)</label>
							<input class="field-input" type="text" name="files_d" id="files_d" required="true" style="color: #2a2a2a;" />      
						</div>

						<button type="submit" name="submit_r_f" id="button-delete">Supprimer</button>
						
					</form>

				</div>

			</aside>

			<br><br><br><br><br><div id="mobile"><br><br><br><br></div>

			<?php

				/* On set l'UTF-8 */

				setlocale(LC_ALL,'fr_FR.UTF-8');

				/* On set les variables */

				$dir_nom = "pages/upload/" . $_SESSION['name_crypted'];
				$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas');
				$fichier= array();
				$dossier= array();

				/* Compte les fichiers */

				$file = glob($dir_nom . '/*.*');
				$count = count($file);

				/* ------------------------------------------------------------------ */

				while($element = readdir($dir)) {
					if($element != '.' && $element != '..') {
						if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
						else {$dossier[] = $element;}
					}
				}

				closedir($dir);

				if (!empty($dossier)) {
				 	sort($dossier);

				 	foreach ($dossier as $lien) {
				 		
				 		/* Dossiers */

						/* Affichage des dossiers */

						echo '<a href="?p=folder&folder='.$lien.'&token='. $_SESSION['token'] .'" style="color: #494949;"><img src="./img/files.png" width="215" height="200" style="padding-top: 3em; padding-left: 3em;">' . $lien . '</a>';
						
					    $_SESSION['folder'] = $lien;

				 	}
				 }

				if(!empty($fichier)){
					sort($fichier);

					foreach($fichier as $lien) {
						/* ------------ Récupération de l'extension du fichier ------------- */

						$info = $dir_nom . '/' . $lien;

						$ext_s = pathinfo($info);
												    
						$ext = str_replace(".txt", "", $lien);

						/* ------------------ Mise en place de la détéction ----------------- */

						if (strpos($ext, "png")) {

							echo '<a href="#edit" class="js-modal" style="color: #494949;"><img href="#edit" class="js-modal" src="./img/files-icon/028-png.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "jpg")) {

							echo '<a href="#edit1" class="js-modal" style="color: #494949;"><img href="#edit1" class="js-modal" src="./img/files-icon/042-jpg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit1" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "jpeg")) {

							echo '<a href="#edit2" class="js-modal" style="color: #494949;"><img href="#edit2" class="js-modal" src="./img/files-icon/042-jpg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit2" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "gif")) {

							echo '<a href="#edit3" class="js-modal" style="color: #494949;"><img href="#edit3" class="js-modal" src="./img/files-icon/012-gif.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit3" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ico")) {

							echo '<a href="#edit4" class="js-modal" style="color: #494949;"><img href="#edit4" class="js-modal" src="./img/files-icon/006-ico.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit4" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "bmp")) {

							echo '<a href="#edit5" class="js-modal" style="color: #494949;"><img href="#edit5" class="js-modal" src="./img/files-icon/021-bmp.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit5" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "svg")) {

							echo '<a href="#edit6" class="js-modal" style="color: #494949;"><img href="#edit6" class="js-modal" src="./img/files-icon/038-svg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit6" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "tif")) {

							echo '<a href="#edit7" class="js-modal" style="color: #494949;"><img href="#edit7" class="js-modal" src="./img/files-icon/019-tif.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit7" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "3gp")) {

							echo '<a href="#edit8" class="js-modal" style="color: #494949;"><img href="#edit8" class="js-modal" src="./img/files-icon/020-3gp.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit8" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($lien, ".txt.txt")) {

							echo '<a href="#edit9" class="js-modal" style="color: #494949;"><img href="#edit9" class="js-modal" src="./img/files-icon/024-txt.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit9" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>

										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "exe")) {

							echo '<a href="#edit10" class="js-modal" style="color: #494949;"><img href="#edit10" class="js-modal" src="./img/files-icon/039-exe.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit10" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible.</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, 'mp4')) {

							echo '<a href="#edit11" class="js-modal" style="color: #494949;"><img href="#edit11" class="js-modal" src="./img/files-icon/030-mp4.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit11" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, 'mp3')) {

							echo '<a href="#edit12" class="js-modal" style="color: #494949;"><img href="#edit12" class="js-modal" src="./img/files-icon/033-mp3.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit12" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, 'mov')) {

							echo '<a href="#edit13" class="js-modal" style="color: #494949;"><img href="#edit13" class="js-modal" src="./img/files-icon/031-mov.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit13" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "cpp")) {

							echo '<a href="#edit14" class="js-modal" style="color: #494949;"><img href="#edit14" class="js-modal" src="./img/files-icon/032-c++.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit14" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "apk")) {

							echo '<a href="#edit15" class="js-modal" style="color: #494949;"><img href="#edit15" class="js-modal" src="./img/files-icon/040-apk.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit15" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "sql")) {

							echo '<a href="#edit16" class="js-modal" style="color: #494949;"><img href="#edit16" class="js-modal" src="./img/files-icon/034-sql.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit16" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "jar")) {

							echo '<a href="#edit17" class="js-modal" style="color: #494949;"><img href="#edit17" class="js-modal" src="./img/files-icon/048-jar.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit17" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "js")) {

							echo '<a href="#edit18" class="js-modal" style="color: #494949;"><img href="#edit18" class="js-modal" src="./img/files-icon/014-js.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit18" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ph") && $lien != "index.php") {

							echo '<a href="#edit19" class="js-modal" style="color: #494949;"><img href="#edit19" class="js-modal" src="./img/files-icon/013-php.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit19" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "css")) {

							echo '<a href="#edit20" class="js-modal" style="color: #494949;"><img href="#edit20" class="js-modal" src="./img/files-icon/001-css.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit20" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "htm")) {

							echo '<a href="#edit21" class="js-modal" style="color: #494949;"><img href="#edit21" class="js-modal" src="./img/files-icon/016-html.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit21" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "avi")) {

							echo '<a href="#edit22" class="js-modal" style="color: #494949;"><img href="#edit22" class="js-modal" src="./img/files-icon/018-avi.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit22" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "iso")) {

							echo '<a href="#edit23" class="js-modal" style="color: #494949;"><img href="#edit23" class="js-modal" src="./img/files-icon/023-iso.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit23" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "pdf")) {

							echo '<a href="#edit24" class="js-modal" style="color: #494949;"><img href="#edit24" class="js-modal" src="./img/files-icon/026-pdf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit24" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "rar")) {

							echo '<a href="#edit25" class="js-modal" style="color: #494949;"><img href="#edit25" class="js-modal" src="./img/files-icon/035-rar.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit25" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "zip")) {

							echo '<a href="#edit26" class="js-modal" style="color: #494949;"><img href="#edit26" class="js-modal" src="./img/files-icon/009-zip.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit26" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ppt")) {

							echo '<a href="#edit27" class="js-modal" style="color: #494949;"><img href="#edit27" class="js-modal" src="./img/files-icon/045-ppt.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit27" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "dll")) {

							echo '<a href="#edit28" class="js-modal" style="color: #494949;"><img href="#edit28" class="js-modal" src="./img/files-icon/041-dll.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit28" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "dwg")) {

							echo '<a href="#edit29" class="js-modal" style="color: #494949;"><img href="#edit29" class="js-modal" src="./img/files-icon/022-dwg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit29" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ai")) {

							echo '<a href="#edit30" class="js-modal" style="color: #494949;"><img href="#edit30" class="js-modal" src="./img/files-icon/027-ai.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit30" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "obj")) {

							echo '<a href="#edit31" class="js-modal" style="color: #494949;"><img href="#edit31" class="js-modal" src="./img/files-icon/029-obj.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit31" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "cdr")) {

							echo '<a href="#edit32" class="js-modal" style="color: #494949;"><img href="#edit32" class="js-modal" src="./img/files-icon/025-cdr.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit32" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "wav")) {

							echo '<a href="#edit33" class="js-modal" style="color: #494949;"><img href="#edit33" class="js-modal" src="./img/files-icon/044-wav.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit33" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<center><p style="font-family: 'Arial';">Aperçu non disponible</p></center>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "psd")) {

							echo '<a href="#edit34" class="js-modal" style="color: #494949;"><img href="#edit34" class="js-modal" src="./img/files-icon/043-psd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit34" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 500px"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "3ds")) {

							echo '<a href="#edit35" class="js-modal" style="color: #494949;"><img href="#edit35" class="js-modal" src="./img/files-icon/049-3ds.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit35" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "eps")) {

							echo '<a href="#edit36" class="js-modal" style="color: #494949;"><img href="#edit36" class="js-modal" src="./img/files-icon/050-eps.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit36" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ttf")) {

							echo '<a href="#edit37" class="js-modal" style="color: #494949;"><img href="#edit37" class="js-modal" src="./img/files-icon/047-ttf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit37" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "doc")) {

							echo '<a href="#edit38" class="js-modal" style="color: #494949;"><img href="#edit38" class="js-modal" src="./img/files-icon/037-doc.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit38" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php
							
						}elseif (strpos($ext, "indd")) {

							echo '<a href="#edit39" class="js-modal" style="color: #494949;"><img href="#edit39" class="js-modal" src="./img/files-icon/036-indd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
						
							?>

								<aside id="edit39" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "otf")) {

							echo '<a href="#edit40" class="js-modal" style="color: #494949;"><img href="#edit40" class="js-modal" src="./img/files-icon/017-otf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit40" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "log")) {

							echo '<a href="#edit41" class="js-modal" style="color: #494949;"><img href="#edit41" class="js-modal" src="./img/files-icon/008-log.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit41" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<?php
										
											if (isset($_POST['save'])) {

												$textarea = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
													
												fwrite(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "w"), $textarea);

											}
										
										?>

										<form method="post" id="formEdit">

											<textarea id="textarea-modal" name="textarea"><?php echo fread(fopen("pages/upload/".$_SESSION['name_crypted']."/".$lien, "r+"), filesize("pages/upload/".$_SESSION['name_crypted']."/".$lien)); ?></textarea>

											<br><br>

											<center><input type="submit" name="save" id="save_button" value="Sauvegarder"></input></center>

										</form>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "xd")) {

							echo '<a href="#edit42" class="js-modal" style="color: #494949;"><img href="#edit42" class="js-modal" src="./img/files-icon/002-xd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit42" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "url")) {

							echo '<a href="#edit43" class="js-modal" style="color: #494949;"><img href="#edit43" class="js-modal" src="./img/files-icon/003-url.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit43" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "ae")) {

							echo '<a href="#edit44" class="js-modal" style="color: #494949;"><img href="#edit44" class="js-modal" src="./img/files-icon/005-AE.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit44" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "fla")) {

							echo '<a href="#edit45" class="js-modal" style="color: #494949;"><img href="#edit45" class="js-modal" src="./img/files-icon/015-fla.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit45" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "eml")) {

							echo '<a href="#edit46" class="js-modal" style="color: #494949;"><img href="#edit46" class="js-modal" src="./img/files-icon/007-eml.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit46" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "xls")) {

							echo '<a href="#edit47" class="js-modal" style="color: #494949;"><img href="#edit47" class="js-modal" src="./img/files-icon/010-xls.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit47" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif (strpos($ext, "mu")) {

							echo '<a href="#edit48" class="js-modal" style="color: #494949;"><img href="#edit48" class="js-modal" src="./img/files-icon/011-muse.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit48" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
										<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}elseif ($lien == "index.php") {
							
						}else{

							echo '<a href="#edit49" class="js-modal" style="color: #494949;"><img href="#edit49" class="js-modal" src="./img/files-icon/024-txt.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';

							?>

								<aside id="edit49" class="modal" aria-hidden="true" role="dialog" aria-modal="false" style="display:none;">

									<div class="modal-wrapper js-modal-stop">

										<button class="js-modal-close" style="background:transparent; border:none; font-size: 18px; float: right;">╳</button>

										<br><br>
								
											<iframe src="pages/upload/<?php echo $_SESSION['name_crypted']."/".$lien; ?>" style="width: 420px; height: auto; border: none;"></iframe>

										<br>

									</div>

								</aside>

							<?php

						}

					}

				 }

			?>

		</div>

	</section>

	<?php

	}

?>