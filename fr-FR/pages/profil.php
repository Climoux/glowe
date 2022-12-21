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

    $password = $_SESSION['password'];
    
?>
        
<section id="profil-section-background">

    <br><br><br><br><br>

    <div id="div-profil">

        <h2 class="header">Information sur l'utilisateur <?php echo $_SESSION['name']; ?></h2>
        <p class="p">Name : <?php echo $_SESSION['name']; ?></p>
        <p class="p">Email : <?php echo $_SESSION['email']; ?></p>
        <p class="p">Password : <?php 
                
        $array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "x", "Y", "Z"); 
        $count = strlen($password); 
                $pass = str_replace($array, "*", $password, $count);               
                
        echo $pass; ?></p>
                
        <br>

        <p class="p">Vous ne devez pas transmettre votre mot de passe ni votre nom.</p>

        <br><br>

        <h2 class="header">Services</h2>
            
        <br>

        <button id="btn-access"><a href="projects/hébergeur/?p=stockage-panel&token=<?= $_SESSION['token'] ?>" id="link-panel">Accès à l'hébergement</a></button><br><br>
        <button id="btn-access"><a href="?p=settings&token=<?= $_SESSION['token'] ?>" id="link-panel">Paramètres</a></button><br><br>

        <?php
        
            $filename = 'pages/admins.log';
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            
            if (str_contains($contents, hash('sha256', getIp())) && str_contains($contents, hash('sha256', $_SESSION['email']))) {
        
        ?>
        
            <button id="btn-access"><a href="?p=panel&token=<?= $_SESSION['token'] ?>" id="link-panel">Accès au Panel</a></button><br><br>
            <button id="btn-access"><a href="?p=users-list&token=<?= $_SESSION['token'] ?>" id="link-panel">Liste des Membres</a></button>
            
        <?php
        
            }
        
        ?>
        
    </div>

    <br><br><br>

</section>