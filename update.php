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
/* $sql = "UPDATE client SET nom='Dupont' WHERE clientID = 1";
$rs_update = $cnx->exec($sql);

if ($rs_update){
    echo 'Modification réeussi';

}else {
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}*/


// PREPARATION DE LA REQUETE MARQUEURS GENERIQUES
/*$CLIENTID = 8;
$PRENOM = 'françois';
$NOM = 'Morel';
$VILLEID = 2;

$sql = "UPDATE client SET prenom = ?, nom= ?, villeID = ? WHERE clientID = ?";
$rs_update = $cnx->exec($sql);

$rs_update->execute(array($PRENOM, $NOM, $VILLEID, $CLIENTID));

if ($rs_update){
   echo 'Modification réeussi';

}else {
   $erreur = $cnx->errorInfo();
   echo $erreur[2];
}*/


// MARQUEURS NOMMEES
/* $CLIENTID = 6;
$PRENOM = 'laye';
$NOM = 'DIOP';
$VILLEID = 1;

$sql = "UPDATE client SET prenom =:prenom, nom=:nom, villeID =:villeID WHERE clientID = ?";
$rs_update = $cnx->exec($sql);

$rs_update->execute(array(":prenom"=>$PRENOM,
                            ":nom"=>$NOM,
                            ":villeID"=>$VILLEID,
                            "clientID"=>$CLIENTID));

if ($rs_update){
    echo 'Modification réeussi';

}else {
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
} */

// VERIFICATION DES DONNEES
/* $CLIENTID = 8;
$PRENOM = 'frank';
$NOM = 'denis';
$VILLEID = 1;

$sql = "UPDATE client SET prenom =:prenom, nom=:nom, villeID =:villeID WHERE clientID =:clientID";
$rs_update = $cnx->prepare($sql);
$rs_update->bindValue(':prenom', $PRENOM, PDO::PARAM_STR);
$rs_update->bindValue(':nom',$NOM,PDO::PARAM_STR);
$rs_update->bindValue(':villeID',$VILLEID,PDO::PARAM_INT);
$rs_update->bindValue(':clientID',$CLIENTID,PDO::PARAM_INT);

$rs_update->execute();

if ($rs_update){
    echo 'Modification réeussi';

}else {
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
} */

// OU
$CLIENTID = 2;
$PRENOM = 'françois';
$NOM = 'fillon';
$VILLEID = 1;

$sql = "UPDATE client SET prenom =?, nom=?, villeID =?WHERE clientID =?";
$rs_update = $cnx->prepare($sql);
$rs_update->bindValue(1, $PRENOM, PDO::PARAM_STR);
$rs_update->bindValue(2,$NOM,PDO::PARAM_STR);
$rs_update->bindValue(3,$VILLEID,PDO::PARAM_INT);
$rs_update->bindValue(4,$CLIENTID,PDO::PARAM_INT);

$rs_update->execute();

if ($rs_update){
    echo 'Modification réeussi';

}else {
    $erreur = $cnx->errorInfo();
    echo $erreur[2];
}












?>
</body>
</html>



