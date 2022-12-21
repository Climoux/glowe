<?php 
	
	if (isLogged() == 0) {
	    
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
	    
	    fwrite(fopen('projects/hébergeur/pages/visibility/save/'. sha1($user) .'/ip.ini', "a"), hash('sha256', getIp()));

	?>

	<section>
	    
	    <div id="informations-website">
	        
	        <br><br><br><br><br><br><br><br><br><br><br><br><br>
	        
	        <center>
	            
	            <h2><font color="white">Nouvelle adresse IP confirmé !<br>Vous allez être redirigé dans quelques secondes.</font></h2>
	            
	        </center>
	        
	        <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/?p=login">
	        

	        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	        
	    </div>
	    
	</section>
	
	<?php
	
	}else{
	    
	?>
	    
	    <section>
	    
    	    <div id="informations-website">
    	        
    	        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	        <center>
    	            
    	            <h2><font color="white">Cette IP est déjà enregistrée.</font></h2>
    	            
    	        </center>
    	        
    	        <meta http-equiv="refresh" content="4; URL=https://glowe.fr/fr-FR/">
    
    	        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	        
    	    </div>
    	    
    	</section>
	    
	    <?php
	    
	}
	
	?>