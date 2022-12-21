<?php 
	if(isLogged() == 0){
        header("Location:../../index.php?p=login");
    }
    
?>

<section>

	<div id="panel-div-stockage">

		<br><br><br><br><br>

		<center>
						
			<form method="post" enctype="multipart/form-data" class="form-upload">				
			    <h2 style="color: #3a3a3a;">Upload Fichier</h2>
			    <input type="file" id="file-input" name="all" id="fileUpload"><br>
				<input type="button" name="submit" onclick="uploadFile()" value="Upload" id="upload-button-submit"><br>
				<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
				<h3 id="status" style="font-family: 'Arial'; color: #3d3d3d;"></h3>
		    </form>

			<script id="rendered-js">
				function _(el) {
					return document.getElementById(el);
				}

				function uploadFile() {
					var file = _("file-input").files[0];
					// alert(file.name+" | "+file.size+" | "+file.type);
					var formdata = new FormData();
					formdata.append("file-input", file);
					var ajax = new XMLHttpRequest();
					ajax.upload.addEventListener("progress", progressHandler, false);
					ajax.addEventListener("load", completeHandler, false);
					ajax.addEventListener("error", errorHandler, false);
					ajax.addEventListener("abort", abortHandler, false);
					ajax.open("POST", "pages/upload.php");
					ajax.send(formdata);
				}

				function progressHandler(event) {
					var percent = event.loaded / event.total * 100;
					_("progressBar").value = Math.round(percent);
	    			_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
				}

				function completeHandler(event) {
					_("status").innerHTML = event.target.responseText;
					_("progressBar").value = 0; //wil clear progress bar after successful upload
				}

				function errorHandler(event) {
					_("status").innerHTML = "Upload Failed";
				}

				function abortHandler(event) {
					_("status").innerHTML = "Upload Aborted";
				}
			</script>

			<p style="font-family: 'Arial';" class="p-form-upload">Vous pouvez upload un fichier jusqu'à une taille maximale de 1024 Mo.</p>

		</center>
		
		<div class="wrapper">
		    
			<button id="btn-panel"><img src="./img/secure.png" name="Secure" alt="SecureImg" width="30" height="30" style="margin-left: -2.5em;"><a href="?p=visibility" id="link-panel-div" style="margin-left: 1em;">Visibilité</a></button></li>

			<button id="btn-panel"><img src="./img/files.png" name="Files" alt="FilesImg" width="29" height="24" style="margin-left: -2em;"><a href="?p=files&token=<?php echo $_SESSION['token']; ?>" id="link-panel-div" style="margin-left: 1em;">Fichiers</a></button></li>

		</div>

	</div>

</section>

<script src="js/uploadTime.js"></script>