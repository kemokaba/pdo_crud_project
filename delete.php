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
// MISE EN PLACE DE LA REQUETE

/*$sql = 'DELETE FROM client WHERE clientID = 5';
$rs_delete = $cnx->exec($sql);

if($rs_delete){
    echo "Suppression réussie";
}else{
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}*/

// PREPARATION DE LA REQUETE AVEC MARQUEURS GENERIQUE
/*$CLIENTID = 9;
$sql = 'DELETE FROM client WHERE clientID = ?';
$rs_delete = $cnx->prepare($sql);

$rs_delete->execute(array($CLIENTID));

if($rs_delete){
    echo "Suppression réussie";
}else{
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}*/

// PREPARATION DE LA REQUETE AVEC MARQUEURS NOMMEES
$CLIENTID = 10;
$sql = 'DELETE FROM client WHERE clientID =:clientID';
$rs_delete = $cnx->prepare($sql);

$rs_delete->execute(array(":clientID"=>$CLIENTID));

if($rs_delete){
    echo "Suppression réussie";
}else{
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}

// VERIFICATION DES DONNEES
/*$CLIENTID = 10;

$sql = 'DELETE FROM client WHERE clientID =:clientID';
$rs_delete = $cnx->prepare($sql);

$rs_delete->bindValue(":clientID",$CLIENTID,PDO::PARAM_INT);
$rs_delete->execute();

if($rs_delete){
    echo "Suppression réussie";
}else{
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}*/

$CLIENTID = 4;

$sql = 'DELETE FROM client WHERE clientID = ?';
$rs_delete = $cnx->prepare($sql);

$rs_delete->bindValue(1,$CLIENTID,PDO::PARAM_INT);
$rs_delete->execute();

if($rs_delete){
    echo "Suppression réussie";
}else{
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}

$cnx = NULL // Cloture de l'instance PDO









?>
</body>
</html>



