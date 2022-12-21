<?php 
								
								setlocale(LC_ALL,'fr_FR.UTF-8');
								
								$dir = opendir($dir_nom) or die('Erreur de listage, le répertoire n\'existe pas');
								$fichier= array();$dossier= array();
								$file = glob($dir_nom . '/*.*');
						
								$count = count($file);

								while($element = readdir($dir)) {
									
									if($element != '.' && $element != '..') {
										
										if (!is_dir($dir_nom.'/'.$element)) {
											
											$fichier[] = $element;
										
										}else {
											
											$dossier[] = $element;
										
										}
									}
								}
								
								closedir($dir);

								if (!empty($dossier)) {
										
									sort($dossier);
										
									foreach ($dossier as $lien) {

										if (file_exists('pages/upload/'.sha1($f).'/'.$element.'/')) {
											
											echo '<a href="?p=main-folder&f='.$f.'&folder='.$lien.'" target="_blank" style="color: #494949;"><img src="./img/files.png" width="215" height="200" style="padding-top: 3em; padding-left: 3em;">' . $lien . '</a>';
										
											$_SESSION['folder'] = $lien;

										}

									}
									
								}
								
								if(!empty($fichier)){
									
									sort($fichier);
									
									foreach($fichier as $lien) {
										
										$info = $dir_nom . '/' . $lien;
										$ext = pathinfo($info);
										
										if ($ext['extension'] == 'png') {
											
											echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/028-png.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
										
										}elseif ($ext['extension'] == 'jpg') {
											
											echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/042-jpg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
										
										}elseif ($ext['extension'] == 'jpeg') {
											
											echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/042-jpg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
										
										}elseif ($ext['extension'] == 'gif') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/012-gif.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'ico') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/006-ico.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'bmp') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/021-bmp.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'svg') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/038-svg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'tif') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/019-tif.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == '3gp') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/020-3gp.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'txt') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/024-txt.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'exe') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/039-exe.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'mp4') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/030-mp4.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'mp3') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/033-mp3.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'mov') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/031-mov.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'cpp') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/032-c++.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'apk') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/040-apk.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'sql') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/034-sql.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'jar') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/048-jar.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'js') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/014-js.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'php' && $lien != "index.php") {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/013-php.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'css') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/001-css.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'html') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/016-html.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'avi') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/018-avi.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'iso') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/023-iso.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'pdf') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/026-pdf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'rar') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/035-rar.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'zip') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/009-zip.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'ppt') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/045-ppt.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'dll') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/041-dll.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'dwg') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/022-dwg.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'ai') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/027-ai.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'obj') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/029-obj.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'cdr') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/025-cdr.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'wav') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/044-wav.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'psd') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/043-psd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == '3ds') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/049-3ds.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'eps') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/050-eps.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'ttf') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/047-ttf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'doc') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/037-doc.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'indd') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/036-indd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'otf') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/017-otf.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'log') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/008-log.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'xd') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/002-xd.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'url') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/003-url.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'ae') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/005-AE.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'fla') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/015-fla.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'eml') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/007-eml.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'xls') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/010-xls.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($ext['extension'] == 'mu') {
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/011-muse.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											
											}elseif ($lien == "index.php") {
							
											}else{
												
												echo '<a href="pages/upload/' . sha1($f) . '/' . $lien . '" target="_blank" style="color: #494949;"><img src="./img/files-icon/046-file.png" width="200" height="200" style="padding-top: 3em; padding-left: 3em;">'. $lien .'</a>';
											}
										}
									}