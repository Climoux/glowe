<?php
    if(isLogged() == 1){
        header("Location:index.php?p=profil");
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
    
    // Start verification
    
    if(isset($_POST['submit'])){
        
        if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
        {
            $secret = '0x***********************';
            $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success)
            {
                $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
                $password = hash('sha256', htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8'));
                $password_clear = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
                                                								
                $sql = "SELECT * FROM `users` WHERE `email`='$email'";
                                                
                $stmt = $db->query($sql);
                                                
                if($stmt == false){
                    die("Erreur");
                }
                              
                /* --------------------------------------------- */
                    
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

                    $name = $row['name'];
    
                    if (user_exist($email,$password)) {
                        
                        $_SESSION['test'] = $name;
                        update(hash('sha256', getIp()), $name);
                        header("Location:index.php?p=profil");
                    
                    } elseif (user_exist_none($email,$password)) {
                        
                        $error = "Votre compte n'a pas été verifié.";
                        
                    } else {
                        
                        $error = "Adresse email et/ou mot de passe incorrect.";
                                                
                    }
                      
                    $found;
    
                    if ($found = true){
                        $_SESSION['name'] = $name;
                    }
            
                    if ($found = true){
                        $_SESSION['email'] = $email;
                    }
            
                    if ($found = true){
                        $_SESSION['password'] = $password_clear;
                    }
            
                    if ($found = true){
                        $_SESSION['name_crypted'] = sha1($name);
                    }
                              
                    function random($car){
                        $string = "";
                        $chaine = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                        srand((double)microtime()*1000000);
                        for($i=0; $i<$car; $i++) {
                            $string .= $chaine[rand()%strlen($chaine)];
                        }
                        return $string;
                    }
                              
                    $token_gen = random(15);
                              
                    if ($found = true){
                        $_SESSION['token'] = $token_gen;
            
                    }
        
                endwhile;
            } 
            else {
                $error = "Le hCaptcha n'est pas valide.";
            }
        }
        
    }

?>

<div class="container">
    <div class="left">
        <div class="header">
            <h2 class="animation a1">Content de vous revoir</h2>
            <h4 class="animation a2">Connectez-vous à votre compte en utilisant votre email et mot de passe</h4>
        </div>
        <form method="post">
            <div class="form">
                <input type="email" name="email" class="form-field animation a3" placeholder="Adresse Email">
                <input type="password" name="password" class="form-field animation a4" placeholder="Mot De Passe">
                <p class="error animation a5"><?php echo (isset($error)) ? $error : ''; ?></p><br>
                <div class="h-captcha animation a4" data-sitekey="20942ecc-9479-4440-a946-d4ec97ed107b"></div><br>
                <button class="animation a5" type="submit" name="submit">CONNEXION</button>
            </div>
        </form>
        </div>
    <div class="right"></div>
</div>

<script src="https://js.hcaptcha.com/1/api.js?hl=fr" async defer></script>