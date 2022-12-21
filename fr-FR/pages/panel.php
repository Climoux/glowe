<?php
	if(isLogged() == 0){
        header("Location:index.php?p=login");
    }

	// Fonctions

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }
    
    function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    // END fonctions

  	$filename = 'pages/admins.log';
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
            
    if (str_contains($contents, hash('sha256', getIp())) && str_contains($contents, hash('sha256', $_SESSION['email']))) {

?>

	<section>
		
		<div id="panel-div-stockage">

			<br><br>

			<center>

				<br>

				<h2 style="color: #3f3f3f;">Bienvenue sur le <font color="aqua">Panel</font> Staff</font></h2>

				<p id="p1" style="color: #3f3f3f;">Signalements reportés :</p><br>

				<?php

					function report(){
						global $db;
						$req = $db->query("SELECT * FROM report");
						$results = array();
						while($rows = $req->fetchObject()){
							$results[] = $rows;
						}
						return $results;
					}

					foreach(report() as $report){
						if($report->email != $_SESSION['u610518065_test']){

				?>

					<div class="msg" style="margin-left:12em;">
						<span>Email : <?= $report->email ?></span><br/>
						<span>Détails : <?= $report->details ?></span><br/>
                        <span>Sujet : <?= $report->sujet ?></span><br/>
					</div>

				<?php
					    }
                    }
				?>

			</center>

			<br><br><br><br>

			<div class="wrapper" style="margin-top:-18.7em;width: 12em;">
												
				<br>

				<button id="btn-panel"><img src="./img/mail-inbox.png" name="Mail" alt="MailInboxAppImg" width="35" height="25" style="margin-left: -2em;"><a href="?p=panel-msg" id="link-panel-div" style="margin-left: 1em;">Messages</a></button>
				
				<button id="btn-panel"><img src="./img/pin.png" name="Pin" alt="PinImg" width="25" height="25" style="margin-left: -1.5em;"><a href="?p=panel-actus" id="link-panel-div" style="margin-left: 1em;">Actualités</a></button>
				
				<button id="btn-panel"><a href="?p=panel-recrut"  id="recruitment-panel">Recrutements</a></button>

			</div>

		</div>

	</section>

<?php

	}else {

?>

	<section>
		
		<div id="panel-div-stockage">

			<br><br><br>

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