<?php

    function pseudo_taken($name){
        global $db;
        $e = array('name' => $name);
        $sql = 'SELECT * FROM users WHERE name = :name';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function password_taken($password){
        global $db;
        $e = array('password' => $password);
        $sql = 'SELECT * FROM users WHERE password = :password';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }
    
    function modify($name, $password){
        global $db;
        $r = array(
            'name'=>$name,
            'password'=>$password
        );
        $mail = $_SESSION['email'];
        $sql = "UPDATE users SET name=:name, password=:password WHERE email='$mail'";
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