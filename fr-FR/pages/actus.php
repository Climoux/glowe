<section>
	    
    <div id="informations-website" style="padding-top:10em;height:auto;width:100%;min-height:60vh;">
                                        
        <center>

            <?php

                function actus(){
                    global $db;
                    $req = $db->query("SELECT * FROM actus");
                    $results = array();
                    while($rows = $req->fetchObject()){
                        $results[] = $rows;
                    }
                    return $results;
                }

                function actus_count(){
                    global $db;
                    $req = $db->query("SELECT COUNT(*) FROM actus");
                    $results = array();
                    $rows = $req->fetchColumn();
                    $results = $rows;
                    return $results;
                }

                if (actus_count() < 1) {
                    echo "<div id=\"embed_chawe_first_message\" style=\"color:white;font-size:24px;\"><span>C'est calme... Très calme...</span></div>";
                }

			    foreach(actus() as $actus){

                    if ($actus->name == "rzqr") {

                    } else {
			?>

                        <div class="msg">
                            <span>Ajouter par <?= $actus->name ?> le <?= $actus->date ?></span><br/>
                            <span><?= $actus->content ?></span><br/>
                        </div><br><br>

			<?php
                    }
                }
			?>
                        
        </center>
                    
    </div>
                
</section>