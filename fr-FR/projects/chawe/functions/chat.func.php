<?php 

    setlocale(LC_TIME, "fr_FR");
    date_default_timezone_set("Europe/Paris");

    function send($sender, $email, $msg){
        global $db;
        $r = array(
            'sender'=>$sender,
            'email'=>$email,
            'message'=>$msg
        );
        $sql = "INSERT INTO messages(sender,email,message,date) VALUES(:sender,:email,:message,'".strftime('%e %B %Y à %H:%M')."')";
        $req = $db->prepare($sql);
        $req->execute($r);
    }

?>