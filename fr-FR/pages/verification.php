<?php

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
                                								
    if ($user == hash('sha256', getIp()) && $user != "") {
		
		$sql = "SELECT * FROM `users` WHERE `ip`='$user'";
                                                
		$stmt = $db->query($sql);
													
		if($stmt == false){
			die("Erreur");
		}
								
		/* --------------------------------------------- */
						
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
		
			if ($key != "" && $key == $row['verif_key']) {

				function validated($valide, $user){
					global $db;
					$r = array(
						'valide'=>$valide,
						'ip'=>$user
					);
					$sql = "UPDATE users SET valide=:valide WHERE ip=:ip";
					$req = $db->prepare($sql);
					$req->execute($r);
				}
			
				validated("Oui", $user);
	
?>

<section>
	    
	<div id="informations-website">
	        
	    <br><br><br><br><br><br><br><br><br><br><br><br><br>
	        
	    <center>
	            
	        <h2><font color="white">Votre compte a bien été activé !<br>Vous allez être redirigé dans quelques secondes.</font></h2>
	        
        </center>
	        
	    <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/?p=login">
	        

	    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	        
	</div>
	    
</section>
	
<?php
	
			}elseif (!$key || $key == "" || $key != $row['verif_key']) {

?>

	<section>
	    
    	<div id="informations-website">
    	        
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	    <center>
    	            
    	        <h2><font color="white">Lien invalide.</font></h2>
    	            
    	    </center>
    	        
    	    <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/">
    
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	</div>
    	    
    </section>

<?php

			}elseif ($row['valide'] == "Oui") {
	    
?>
	    
	<section>
	    
    	<div id="informations-website">
    	        
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	    <center>
    	            
    	        <h2><font color="white">Votre compte est déjà valide.</font></h2>
    	            
    	    </center>
    	        
    	    <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/">
    
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	</div>
    	    
    </section>
	    
<?php
	    
			}

		endwhile;

	} elseif ($user != hash('sha256', getIp()) || $user == "" || !$user) {
	
?>

	<section>
	    
    	<div id="informations-website">
    	        
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	    <center>
    	            
    	        <h2><font color="white">Lien invalide.</font></h2>
    	            
    	    </center>
    	        
    	    <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/">
    
    	    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	</div>
    	    
    </section>

<?php

	}

?>