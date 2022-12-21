<section>

    <div>

        <center>
            
            <br><br>
			
			<nav id="friends_div">
			    <ul id="wrapper_nav">
			        <li><a href="#"><img src="https://glowe.fr/fr-FR/projects/chawe/img/friends.png" style="width:55px;height:55px;margin-top:10px;" alt="friends" title="Amis"></a></a></li>
			    </ul>
		    </nav>
			
			<div id="div-box-chat">
			    <div id="chat_textarea"><?= include "pages/recup.php" ?></div>
			    
			    <?php

                    # POST message with PHP/7.4
                         
                    if (isset($_POST['submit'])) {
                
                        if (isLogged() == 0) {
                            header('Location:https://glowe.fr/fr-FR/?p=login');
                        }
                                        
                        function encode($data){
                            /* XOR data */
                            for($i = 0; $i < strlen($data); $i++){
                                $data[$i] = ~ $data[$i];
                            }
                            $data = base64_encode($data);
                            return $data;
                        }
                                        
                        $textarea = htmlspecialchars(trim($_POST["textarea"]), ENT_QUOTES, 'UTF-8');
                        $message = encode($textarea);

                        setlocale(LC_TIME, "fr_FR");
                        date_default_timezone_set("Europe/Paris");
                
                        if ($textarea != "") {
                            
                            include_once 'recup.func.php';
                            
                            $r = array(
                                'message'=>$message,
                                'user'=>$_SESSION['name'],
                                'token'=>$_SESSION['token']
                            );
                            $sql = "INSERT INTO messages (message, user, token, date) VALUES (:message, :user, :token, '".strftime("%d/%m/%Y à %H:%M")."')";
                            $req = $db->prepare($sql);
                            $req->execute($r);
                                        
                        } else {
                            # Nothing
                        }
                
                    }
             
                ?>
                
                <div id="div-box-message">
			    
    			    <form method="post" enctype="multipart/form-data">
                             
                        <center>
                            <div id="div-box-textarea">
                                <textarea id="box-textarea" name="textarea" placeholder="Envoyer un message ..." tabindex="1" onkeydown="resizeTextarea('box-textarea', 'div-box-textarea'); before_send();"></textarea>
                            </div>
                        </center>
                        <button type="submit" name="submit" id="perfClick" style="display:none;">Send</button>
    
                    </form>
                    
                </div>
                                
			</div>

		</center>

    </div>

</section>