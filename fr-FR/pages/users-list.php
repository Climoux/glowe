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
        
            <section id="profil-section-background">

                <br>

                <div id="stockage-panel-div-menu">

                    <button id="btn-access" style="margin-left: 2em; margin-top: 1em;" class="position"><a href="index.php?p=profil" id="link-panel">Retour</a></button>

                    <center><h2 style="margin-left: 2em; margin-top: -1.2em;">Utilisateurs inscrits</h2></center>

                </div>

                <div id="div-profil" style="height:100%;margin-top:7em;">

                    <?php 
                    
                        foreach(users() as $user){
                                    
					?>

                        <center><div class="msg">
                            <span>Nom : <?php if ($user->name == $_SESSION['name']) { echo $user->name.' (Vous)'; }else { echo $user->name; } ?></span><br/>
                            <span>Email : <?= $user->email ?></span><br/>
                            <span>Mot de passe chiffré : <?php echo $user->password; ?></span><br><br>
                		</div></center>

                    <?php

                        }

                    ?>

                </div>

            </section>

<?php

    } else {

?>
        
        <section id="profil-section-background">

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