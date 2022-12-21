<?php
    session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    
	    if(isset($_FILES["file-input"]) && $_FILES["file-input"]["error"] == 0){
	        $filename = $_FILES["file-input"]["name"];
	        $filetype = $_FILES["file-input"]["type"];
	        $filesize = $_FILES["file-input"]["size"];

	        $maxsize = 256 * 1024 * 1024;
			if($filesize > $maxsize) die('<center><p style="font-family: \'Arial\'; color: #3d3d3d;">Erreur: La taille du fichier est supérieure à la limite autorisée.</p></center>');

			/* Code de sécurité */

			$filename = strtr($filename,
			    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 

			$filename = preg_replace('/([^.a-z0-9]+)/i', '-', $filename);

            /* On vérifie si le fichier existe déjà */
            
            $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);

	        if(file_exists("upload/" . $_SESSION['name_crypted'] . "/" . $_FILES["file-input"]["name"])){

			 echo '<center><p style="font-family: \'Arial\'; color: #3d3d3d;">' . $_FILES["file-input"]["name"] . " existe déjà.</p></center>";
			 
            } elseif (strpos($imageFileType, "png") || strpos($imageFileType, "PNG") || strpos($imageFileType, "jpg") || strpos($imageFileType, "JPG") || strpos($imageFileType, "jpeg") || strpos($imageFileType, "JPEG") || strpos($imageFileType, "bmp") || strpos($imageFileType, "BMP") || strpos($imageFileType, "ico") || strpos($imageFileType, "ICO") || strpos($imageFileType, "svg") || strpos($imageFileType, "SVG") || strpos($imageFileType, "gif") || strpos($imageFileType, "GIF") || strpos($imageFileType, "webp") || strpos($imageFileType, "WEBP") || strpos($imageFileType, "avif") || strpos($imageFileType, "AVIF") || strpos($imageFileType, "mp3") || strpos($imageFileType, "MP3") || strpos($imageFileType, "asf") || strpos($imageFileType, "ASF") || strpos($imageFileType, "avi") || strpos($imageFileType, "AVI") || strpos($imageFileType, "mp4") || strpos($imageFileType, "MP4") || strpos($imageFileType, "mv4") || strpos($imageFileType, "MV4") || strpos($imageFileType, "mov") || strpos($imageFileType, "MOV") || strpos($imageFileType, "mpg") || strpos($imageFileType, "MPG") || strpos($imageFileType, "MPEG") || strpos($imageFileType, "MPEG") || strpos($imageFileType, "wvm") || strpos($imageFileType, "WVM") || strpos($imageFileType, "aiff") || strpos($imageFileType, "AIFF") || strpos($imageFileType, "au") || strpos($imageFileType, "AU") || strpos($imageFileType, "mid") || strpos($imageFileType, "MID") || strpos($imageFileType, "m4a") || strpos($imageFileType, "M4A") || strpos($imageFileType, "wav") || strpos($imageFileType, "WAV") || strpos($imageFileType, "wma") || strpos($imageFileType, "WMA") || strpos($imageFileType, "txt") || strpos($imageFileType, "TXT")) {
                
                move_uploaded_file($_FILES["file-input"]["tmp_name"], "upload/" . $_SESSION['name_crypted'] . "/" . $_FILES["file-input"]["name"]);
				echo '<center><p style="font-family: \'Arial\'; color: #3d3d3d;">Votre fichier a été téléchargé avec succès.</p></center>';
                
            }else {

				move_uploaded_file($_FILES["file-input"]["tmp_name"], "upload/" . $_SESSION['name_crypted'] . "/" . $_FILES["file-input"]["name"] . ".txt");
				echo '<center><p style="font-family: \'Arial\'; color: #3d3d3d;">Votre fichier a été téléchargé avec succès.</p></center>';
				            
			}

		} else{
			 echo '<center><p style="font-family: \'Arial\'; color: #3d3d3d;">Erreur: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.</p></center>'; 
		}
	} else{
		echo '<center><p style="font-family: \'Arial\'; color: #3d3d3d;">Erreur: ' . $_FILES["file-input"]["error"] . '</p></center>';
	}
?>