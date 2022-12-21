<?php

    function user_exist($email,$password){
        global $db;
        $u = array(
            'email'=>$email,
            'password'=>$password,
            'valide'=>"Oui"
        );
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password AND valide=:valide";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;

    }

    function user_exist_none($email,$password){
        global $db;
        $u = array(
            'email'=>$email,
            'password'=>$password,
            'valide'=>"Non"
        );
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password AND valide=:valide";
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
        $sql = "UPDATE users SET ip=:ip WHERE name=:name";
        $req = $db->prepare($sql);
        $req->execute($r);
    }
    
    function update_pass($password, $name){
        global $db;
        $r = array(
            'password'=>$password,
            'name'=>$name
        );
        $sql = "UPDATE users SET password=:password WHERE name=:name";
        $req = $db->prepare($sql);
        $req->execute($r);
    }