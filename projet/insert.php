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
/*--------------------------------*/

if(isset($_POST['valider'])){

    $ville = $_POST['ville'];
    $habitant = $_POST['habitant'];

    if ((empty($ville))|| (empty($habitant))){

        $message = 'Merci de remplir tous les champs';

    }else {

        $sql = 'INSERT INTO ville (ville,habitant) 
                VALUES (:ville ,:habitant)';
        $rs_insert = $cnx->prepare($sql);

        $rs_insert->bindValue(':ville', $ville, PDO::PARAM_STR);
        $rs_insert->bindValue(':habitant', $habitant, PDO::PARAM_INT);

        $rs_insert->execute();

        $message = 'Insertion OK';
    }


}



?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ville de France</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="box">
            <p class="droit"><a class="droit" href="index.php">Retour</a></p>
            <h1>Inserer une nouvelle ville</h1>
            <?php
                if (isset($message)){
                    echo $message;
                }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><input type="text" name="ville" placeholder="Ville"></p>
            <p><input type="text" name="habitant" placeholder="Habitants"></p>
                <p class="centrer"><input type="submit" name="valider" value="Enregistrer" ></p></form>


        </div>



    </body>
    </html>

<?php
