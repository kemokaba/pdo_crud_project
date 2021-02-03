<?php
$dsn = 'mysql:host=localhost; dbname=tutoprojet; charset=utf8';
$login = 'root';
$pass = '';
try {
    $cnx = new PDO($dsn, $login,$pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

}catch(PDOException $e){
    echo 'Une erreur est survenue';

}

