<?php

    function user_exist($name,$email,$password){
        global $db;
        $u = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'valide'=>"Oui"
        );
        $sql = "SELECT * FROM users WHERE name=:name AND email=:email AND password=:password AND valide=:valide";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;

    }

    function user_exist_none($name,$email,$password){
        global $db;
        $u = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'valide'=>"Non"
        );
        $sql = "SELECT * FROM users WHERE name=:name AND email=:email AND password=:password AND valide=:valide";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;

    }

    function update($ip, $name){
        global $db;
        $r = array(
            'ip'=>$ip,
            'name'=>$name
        );
        $mail = $_SESSION['email'];
        $sql = "UPDATE users SET ip=:ip WHERE name=:name";
        $req = $db->prepare($sql);
        $req->execute($r);
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