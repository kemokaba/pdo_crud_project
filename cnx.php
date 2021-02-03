
<?php
$dsn = 'mysql:host=localhost; dbname=tutoriel; charset=utf8';
$user='root';
$pass='';

try {
    $cnx = new PDO($dsn,$user,$pass);

} catch (PDOException $e){
    echo 'Une ecrreur de connexion est survenu !';
}


