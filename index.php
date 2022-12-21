<?php

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

$ip= file_get_contents("http://api.hostip.info/country.php?ip=".getIp());

/*if ($ip == "US" || $ip == "UK") {
    header("Location:en-US/");
}
else if ($ip == "FR" || $ip == "BE") {
    header("Location:fr-FR/");
}
else {
    header("Location:en-US/");
}*/

header("Location:fr-FR/");

$dbhost = '127.0.0.1';
$dbname = 'test';
$dbuser = 'root';
$dbpswd = '';

try{
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}catch(PDOexception $e){
    die(">Une erreur est survenue lors de la connexion a la base de donnees");
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Glowe Inc. is a platform that offers various free services, free file hosting, public chat and a service to find out its IP address.">
	<meta name="keywords" content="hébergeur, gratuit, free, host, hosting, free host, free hosting, hébergement gratuit, hébergeur gratuit, sécurité, security, rapide, fast, services, online, en ligne, application, french, français, glowe, glow">
	<meta property="og:image" content="https://glowe.fr/fr-FR/img/Glowe.png">
	<link href="https://glowe.fr/fr-FR/css/fonts/fonts.css" rel="stylesheet">
	<link rel="icon" href="https://glowe.fr/fr-FR/img/standard.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/anim.css">
	<link rel="stylesheet" type="text/css" href="https://glowe.fr/fr-FR/css/bootstrap-responsive.css">
	<title>Glowe Inc. - Hébergement, Chat, MonIP. C'est simple, rapide et efficace</title>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7301537377022839"
     crossorigin="anonymous"></script>
</head>
</html>