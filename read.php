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
    <html>
    <head>
        <meta charset="utf-8">
        <title>La classe PDO-</title>
    </head>
    <body>
    <?php


    //Reaquete directe
    /* $sql = 'SELECT ville FROM ville WHERE villeID = 2';
     $rs_select=$cnx->query($sql);
     $data = $rs_select->fetch(PDO::FETCH_ASSOC);
     echo $data['ville'];*/


    /*affichage par object
    $rs_select=$cnx->query($sql);
    while ($data= $rs_select->fetch(PDO::FETCH_OBJ)){
        echo $data->ville.'<br>';
    }*/
    /* Affichage par tableau
    while ($data= $rs_select->fetch(PDO::FETCH_ASSOC)){
        //echo $data['ville'].'<br>';
    }*/
    /*--------------------------------------------------------------------*/

    //Requete Préparée

    /*$sql = 'SELECT ville FROM ville';
    $rs_select=$cnx->prepare($sql);
    $rs_select->execute();
    while ($data= $rs_select->fetch(PDO::FETCH_OBJ)){
        echo $data->ville.'<br>';
    }*/
    /*sql = 'SELECT ville FROM ville WHERE villeID=?';

    $rs_select=$cnx->prepare($sql);
    $rs_select->execute(array('2'));
    $data= $rs_select->fetch(PDO::FETCH_ASSOC);
    echo $data['ville'];*/
    /***********************************************/
    /*$rs_select->execute(array('3'));
    $data= $rs_select->fetch(PDO::FETCH_ASSOC);
    echo '<br>'.$data['ville'];*/

    /*------------------------------PLUSIEURS MARQUEURS------------------------------------
    $sql = 'SELECT prenom, nom FROM client WHERE clientID = ? AND villeID = ?';
    $rs_select=$cnx->prepare($sql);
    $rs_select->execute(array('1','2'));
    $data= $rs_select->fetch(PDO::FETCH_ASSOC);
    echo $data['prenom'].' '.$data['nom'];*/

    /*______________________________MARQUEURS NOMMEES_____________________*/
    try {
        $sql = 'SELECT prenom, nom 
            FROM client
            WHERE clientID = :id_du_client 
            AND villeID = :id_de_la_ville';

        $rs_select=$cnx->prepare($sql);

        $rs_select->execute(array('id_du_client' =>'1',
            'id_de_la_ville' =>'2'));

        $data= $rs_select->fetch(PDO::FETCH_ASSOC);
        echo $data['prenom'].' '.$data['nom'];

    }catch (PDOException $e){
        echo 'Une erreur est survenu';
    }

    $id = $cnx->lastInsertId(); // recuperer le dernier id de l'enregistrement
    echo '<p>'.$id .'</p>'







    ?>
    </body>
    </html>


<?php
