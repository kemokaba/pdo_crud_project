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
    /*------------------------Mise en place des REQUETE--------------/------*/
    /*$prenom = 'Gilles';
    $nom = 'Durand';
    $villeID = 1;

    $sql = "INSERT INTO client(prenom, nom, villeID)
            VALUES('$prenom','$nom',$villeID)";
    $rs_insert= $cnx->exec($sql);

    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    }*/

    /*______________________________________PREPARATION DE LA REQUETE____________________*/

    /*$sql = "INSERT INTO client(prenom, nom, villeID)
                VALUES(?,?,?)";

    $rs_insert= $cnx->prepare($sql);
    $rs_insert->execute(array('franck','Denis',1));

    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    }*/

    /*---------------------------------MARQUEURS NOMMES_____________________*/
    /*$sql = "INSERT INTO client(prenom, nom, villeID)
                    VALUES(?,?,?)";
    $PRENOM = 'francky';
    $NOM = 'Denise';
    $VILLEID = 2;

    $rs_insert= $cnx->prepare($sql);
    $rs_insert->execute(array($PRENOM,$NOM,$VILLEID));

    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    }*/

    /*        //MARQUEUR NOMMES
    $sql = "INSERT INTO client(prenom, nom, villeID)
                    VALUES(:prenom,:nom,:villeID)";

    $PRENOM = 'alex';
    $NOM = 'Morel';
    $VILLEID = 2;

    $rs_insert= $cnx->prepare($sql);
    $rs_insert->execute(array(
                                ":prenom" => $PRENOM,
                                ":nom" => $NOM,
                                "villeID" => $VILLEID));

    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    }*/



    // VERIFICATION DES DONNEES

    /* $sql = "INSERT INTO client(prenom, nom, villeID)
                    VALUES(:prenom,:nom,:villeID)";
    $rs_insert= $cnx->prepare($sql);

    $PRENOM = 'claude';
    $NOM = 'Dubois';
    $VILLEID = 3;


    $rs_insert->bindValue(':prenom',$PRENOM,PDO::PARAM_STR);
    $rs_insert->bindValue(':nom',$NOM,PDO::PARAM_STR);
    $rs_insert->bindValue(':villeID',$VILLEID,PDO::PARAM_INT);


    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    } */

    $sql = "INSERT INTO client(prenom, nom, villeID) 
                        VALUES(?,?,?)";
    $rs_insert= $cnx->prepare($sql);

    $PRENOM = 'pierre';
    $NOM = 'Robin';
    $VILLEID = 3;


    $rs_insert->bindValue(1,$PRENOM,PDO::PARAM_STR);
    $rs_insert->bindValue(2,$NOM,PDO::PARAM_STR);
    $rs_insert->bindValue(3,$VILLEID,PDO::PARAM_INT);


    if ($rs_insert){
        echo 'Insertion OKK';
    }else {
        $erreur = $cnx->errorInfo();
        echo $erreur[2];
    }










    ?>
    </body>
    </html>


<?php
