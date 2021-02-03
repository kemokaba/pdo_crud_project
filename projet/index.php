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


    $sql = 'SELECT * FROM ville';
    $rs_select = $cnx->prepare($sql);
    $rs_select->execute();
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
                <h1>Villes de France, nombre d'habitants</h1>
                <?php
                while ($data = $rs_select->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="ligne">
                    <div>
                        <a title="Supprimer la ville de <?=$data['ville'];?>" class="delete" href="delete.php?villeID=<?echo $data['villeID'];?>">X</a>
                        <a class="update" href="update.php?villeID=<? echo $data['villeID'];?>" > <?=$data['ville'];?></a>
                    </div>
                    <div class="gris"><?=$data['habitant'];?> habitants</div>
                </div>


            <?php
        }

             ?>
                <p class="droit"><a class = "droit" href="insert.php">Ajouter une nouvelle ville</a></p>
</div>

</body>
</html>

