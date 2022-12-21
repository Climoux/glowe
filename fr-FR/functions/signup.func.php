<?php

    function email_taken($email){
        global $db;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM users WHERE email=:email';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function pseudo_taken($name){
        global $db;
        $e = array('name' => $name);
        $sql = 'SELECT * FROM users WHERE name=:name';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function password_taken($password){
        global $db;
        $e = array('password' => $password);
        $sql = 'SELECT * FROM users WHERE password=:password';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }
    
    function register($name, $email, $password, $valide, $ip, $verif_key){
        global $db;
        $r = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'valide'=>$valide,
            'ip'=>$ip,
            'verif_key'=>$verif_key
        );
        $sql = "INSERT INTO users(name,email,password,valide,ip,verif_key) VALUES(:name,:email,:password,:valide,:ip,:verif_key)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }

    /* function creator($name, $email){
        global $db;
        $ar = array(
            'creator'=>$name,
            'creator_email'=>$email
        );
        $sql = "INSERT INTO followers(creator,creator_email,followers) VALUES(:creator,:creator_email,0)";
        $req = $db->prepare($sql);
        $req->execute($ar);
    } */