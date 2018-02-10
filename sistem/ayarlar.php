<?php
$database = [
    "host"    => "localhost",
    "dbname"  => "temeldem_anadoludabugun",
    "user"    => "temeldem_user",
    "pass"    => "tem102030**",
];

try{
    $sql = "mysql:host=".$database['host'].";dbname=".$database['dbname']."";
    $pdo = new PDO($sql,$database['user'], $database['pass']);
    $pdo->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
}catch (PDOException $exception) {
    exit();
}

define("DIZIN", "/bulten/", true);
define("URL", "http://".$_SERVER['HTTP_HOST'], true);
define("SITEURL", URL.DIZIN,true);
date_default_timezone_set('Europe/Istanbul');


?>