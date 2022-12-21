<?php 
	if(isLogged() == 0){
        header("Location:../../index.php?p=signin");
    }

    $password = $_SESSION['password'];

    if ($_SESSION['password'] == 'StaffGloweHF') {

	?>

	<section>
		
		<div id="panel-div-stockage">

			<br><br>

			<center>

				<h2 style="color: #3f3f3f;">Accès <font color="red">Refusé</font></font></h2>

				<p id="p1" style="color: #3f3f3f;">Vous êtes actuellement connecté sur le compte Staff, vous devez avoir un compte Utilisateur pour pouvoir accès à ce panel</p>

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

			</div>

			<br><br><br><br><br><br><br>

			<center>
				
				<h2 style="color: #2a2a2a;">Rendre publique ou privé vos fichiers et dossiers</h2><br><br>

				<?php 

					/* ------------------------------------------------------------------------------------------------------------ */

					if (isset($_POST['submit'])) {

						if (isset($_POST['checkbox'])) {

							if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/')) {

								if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini')) {

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'Yes');

								}else{

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'Yes');

								}

								if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini')) {

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini', "c"), $_SESSION['name_crypted']);

								}else{

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini', "c"), $_SESSION['name_crypted']);

								}

								/* ------------------------------------------------------------------------------------------------- */

								fwrite(fopen('pages/visibility/' . $_SESSION['name'] . '.php', "c"), "<?php 
								
								setlocale(LC_ALL,'fr_FR.UTF-8');
								
								\$dir = opendir(\$dir_nom) or die('Erreur de listage, le répertoire n\'existe pas');
								\$fichier= array();\$dossier= array();
								\$file = glob(\$dir_nom . '/*.*');
						
								\$count = count(\$file);

								while(\$element = readdir(\$dir)) {
									
									if(\$element != '.' && \$element != '..') {
										
										if (!is_dir(\$dir_nom.'/'.\$element)) {
											
											\$fichier[] = \$element;
										
										}else {
											
											\$dossier[] = \$element;
										
										}
									}
								}
								
								closedir(\$dir);

								if (!empty(\$dossier)) {
										
									sort(\$dossier);
										
									foreach (\$dossier as \$lien) {

										if (file_exists('pages/upload/'.sha1(\$f).'/'.\$element.'/')) {
											
											echo '<a href=\"?p=main-folder&f='.\$f.'&folder='.\$lien.'\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files.png\" width=\"215\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">' . \$lien . '</a>';
										
											\$_SESSION['folder'] = \$lien;

										}

									}
									
								}
								
								if(!empty(\$fichier)){
									
									sort(\$fichier);
									
									foreach(\$fichier as \$lien) {
										
										\$info = \$dir_nom . '/' . \$lien;
										\$ext = pathinfo(\$info);
										
										if (\$ext['extension'] == 'png') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/028-png.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
										
										}elseif (\$ext['extension'] == 'jpg') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/042-jpg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
										
										}elseif (\$ext['extension'] == 'jpeg') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/042-jpg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
										
										}elseif (\$ext['extension'] == 'gif') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/012-gif.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ico') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/006-ico.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'bmp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/021-bmp.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'svg') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/038-svg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'tif') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/019-tif.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == '3gp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/020-3gp.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'txt') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/024-txt.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'exe') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/039-exe.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mp4') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/030-mp4.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mp3') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/033-mp3.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mov') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/031-mov.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'cpp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/032-c++.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'apk') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/040-apk.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'sql') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/034-sql.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'jar') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/048-jar.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'js') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/014-js.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'php' && \$lien != 'index.php') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/013-php.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'css') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/001-css.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'html') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/016-html.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'avi') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/018-avi.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'iso') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/023-iso.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'pdf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/026-pdf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'rar') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/035-rar.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'zip') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/009-zip.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ppt') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/045-ppt.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'dll') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/041-dll.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'dwg') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/022-dwg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ai') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/027-ai.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'obj') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/029-obj.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'cdr') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/025-cdr.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'wav') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/044-wav.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'psd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/043-psd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == '3ds') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/049-3ds.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'eps') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/050-eps.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ttf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/047-ttf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'doc') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/037-doc.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'indd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/036-indd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'otf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/017-otf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'log') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/008-log.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'xd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/002-xd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'url') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/003-url.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ae') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/005-AE.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'fla') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/015-fla.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'eml') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/007-eml.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'xls') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/010-xls.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mu') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/011-muse.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$lien == 'index.php') {
																							
											}else{
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/046-file.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											}
										}
									}");

								/* ------------------------------------------------------------------------------------------------- */

								fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/' . $_SESSION['name'] . '-folder.php', "c"), "<?php 
								
								setlocale(LC_ALL,'fr_FR.UTF-8');
								
								\$dir = opendir(\$dir_nom_2) or die('Erreur de listage, le répertoire n\'existe pas');
								\$fichier= array();\$dossier= array();
								
								/* Compte les fichiers */

								\$file = glob(\$dir_nom_2 . '/*.*');
								\$count = count(\$file);

								/* ------------------------------------------------------------------ */

								while(\$element = readdir(\$dir)) {
									if(\$element != '.' && \$element != '..') {
										if (!is_dir(\$dir_nom_2.'/'.\$element)) {\$fichier[] = \$element;}
										else {\$dossier[] = \$element;}
									}
								}
								
								closedir(\$dir);
								
								if(!empty(\$fichier)){
									
									sort(\$fichier);
									
									foreach(\$fichier as \$lien) {
										
										\$info = \$dir_nom_2 . '/' . \$lien;
										\$ext = pathinfo(\$info);
										
										if (\$ext['extension'] == 'png') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/028-png.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
										
										}elseif (\$ext['extension'] == 'jpg') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/042-jpg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
										
										}elseif (\$ext['extension'] == 'jpeg') {
											
											echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/042-jpg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';

										}elseif (\$ext['extension'] == 'gif') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/012-gif.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ico') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/006-ico.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'bmp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/021-bmp.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'svg') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/038-svg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'tif') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/019-tif.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == '3gp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/020-3gp.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'txt') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/024-txt.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'exe') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/039-exe.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mp4') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" href=\"pages/upload/' . \$f . '/' . \$folder . '/' . \$lien . '\" target=\"about_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/030-mp4.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mp3') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" href=\"pages/upload/' . \$f . '/' . \$folder . '/' . \$lien . '\" target=\"about_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/033-mp3.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mov') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" href=\"pages/upload/' . \$f . '/' . \$folder . '/' . \$lien . '\" target=\"about_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/031-mov.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'cpp') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/032-c++.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'apk') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/040-apk.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'sql') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/034-sql.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'jar') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/048-jar.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'js') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/014-js.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'php') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/013-php.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'css') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/001-css.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'html') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/016-html.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'avi') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/018-avi.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'iso') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/023-iso.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'pdf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/026-pdf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'rar') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/035-rar.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'zip') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/009-zip.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ppt') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/045-ppt.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'dll') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/041-dll.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'dwg') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/022-dwg.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ai') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/027-ai.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'obj') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/029-obj.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'cdr') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/025-cdr.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'wav') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/044-wav.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'psd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/043-psd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == '3ds') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/049-3ds.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'eps') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/050-eps.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ttf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/047-ttf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'doc') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/037-doc.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'indd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/036-indd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'otf') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/017-otf.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'log') {

												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/008-log.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'xd') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/002-xd.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'url') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/003-url.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'ae') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/005-AE.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'fla') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/015-fla.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'eml') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/007-eml.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'xls') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/010-xls.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$ext['extension'] == 'mu') {
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/011-muse.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											
											}elseif (\$lien == 'index.php') {
																							
											}else{
												
												echo '<a href=\"pages/upload/' . sha1(\$f) . '/'. \$folder .'/' . \$lien . '\" target=\"_blank\" style=\"color: #494949;\"><img src=\"./img/files-icon/046-file.png\" width=\"200\" height=\"200\" style=\"padding-top: 3em; padding-left: 3em;\">'. \$lien .'</a>';
											}
										}
									}");

									/* ------------------------------------------------------------------------------------------------- */

							}else{

								mkdir('pages/visibility/save/' . $_SESSION['name_crypted'] . '/', 0777, true);

								fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'Yes');

							}

						}else{

							if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/')) {

								if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini')) {

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'No ');

								}else{
								    
									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'No ');

								}

								if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini')) {

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini', "c"), $_SESSION['name_crypted']);

								}else{

									fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/name.ini', "c"), $_SESSION['name_crypted']);

								}

								/* ------------------------------------------------------------------------------------------------- */

								unlink('pages/visibility/' . $_SESSION['name'] . '.php');

								/* ------------------------------------------------------------------------------------------------- */

							}else{

								mkdir('pages/visibility/save/' . $_SESSION['name_crypted'] . '/');

								fwrite(fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "c"), 'No ');

							}

						}

					}

					if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini')) {

						$filename = 'pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini';
						$handle = fopen('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini', "r");
						$contents = fread($handle, filesize($filename));

					}

				?>

				<form method="post" enctype="multipart/form-data">

					<div>
					    <input type="checkbox" id="checkbox" name="checkbox" <?php if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini')) { if ($contents == 'Yes') { echo 'checked'; }} ?> />
					    <label class="checkbox-label" for="checkbox" style="color: #2c2c2c;"> Permettre à tous le monde d'accéder à mes fichiers</label><br><br>

					    <input type="checkbox" id="checkbox_2" name="checkbox_2" <?php if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/files.ini')) { if ($contents == 'No ') { echo 'checked'; }} ?> />
					    <label class="checkbox-label" for="checkbox_2" style="color: #2c2c2c;"> Ne pas permettre à tous le monde d'accéder à mes fichiers</label><br><br>
				  	</div>
					<div>
				    	
				    	<input type="submit" name="submit" value="Sauvegarder" id="upload-button-submit">

				    </div>
					
				</form><br><br>

				<?php

					 if (file_exists('pages/visibility/save/' . $_SESSION['name_crypted'] . '/'. $_SESSION['name'] .'.php')) { 
						 											
						echo '<a href="?p=main&f=' . $_SESSION['name'] . '&folder='.$_SESSION['folder'].'" id="link-panel">Voir</a>';
										
					}else{

						echo '<a href="?p=main&f=' . $_SESSION['name'].'" id="link-panel">Voir</a>';

					}

				?>
				
			</center>

		</div>

	</section>

	<?php

	}

?>