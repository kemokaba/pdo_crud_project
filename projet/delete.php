
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
$sql = 'DELETE FROM ville WHERE villeID = ?';
$rs_delete = $cnx->prepare($sql);
$rs_delete->bindValue('1',$_GET['villeID'], PDO::PARAM_INT);
$rs_delete->execute();
$message = "Suppression effectuée !"




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
    <h1>Supprimer la ville</h1>
    <?php
    if (isset($message)){
        echo '<p class="centrer">'.$message.'</p>';
    }
    ?>


</div>



</body>
</html>

<?php
