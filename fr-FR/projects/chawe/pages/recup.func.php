<?php 

    function decode($data){
        $data = base64_decode($data);
        /* XOR data */
        for($i = 0; $i < strlen($data); $i++){
            $data[$i] = ~ $data[$i];
        }
        return $data;
    }

    $success = false;
    $data = array();

    $dbhost = '127.0.0.1';
    $dbname = 'u610518065_api';
    $dbuser = 'u610518065_climoux';
    $dbpswd = 'Glowe1$HFM';

    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Erreur à la connexion.");
    }