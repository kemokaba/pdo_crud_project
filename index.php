<?php
$dsn = 'mysql:host=localhost; dbname=tutoriel; charset=utf8';
$user='root';
$pass='';

try {
    $cnx = new PDO($dsn,$user,$pass);
    $cnx->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // GESTION D'ERREUR on peut utiliser 'ERRMODE_WARNING'

} catch (PDOException $e){
    echo 'Une ecrreur de connexion est survenu !';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>La classe PDO-</title>
</head>
<body>
    <?php









    ?>
</body>
</html>


