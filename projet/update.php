
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

    if((empty($ville)) || (empty($habitant))) {
        $message = 'Merci de remplire tous les champs';

    } else{
        $sql = "UPDATE ville SET ville = :ville, habitant =:habitant
                WHERE villeID = :villeID";
        $rs_update = $cnx->prepare($sql);
        $rs_update->bindValue(':ville',$ville,PDO::PARAM_STR);
        $rs_update->bindValue(':habitant',$habitant,PDO::PARAM_STR);
        $rs_update->bindValue(':villeID',$_GET['villeID'],PDO::PARAM_INT);
        $rs_update->execute();
        $message ="Modification effectuée !!";
    }
}
$sql = 'SELECT ville, habitant FROM ville
        WHERE villeID = ?';

$rs_select = $cnx->prepare($sql);
$rs_select->bindValue('1',$_GET['villeID'],PDO::PARAM_INT);
$rs_select->execute();
$data = $rs_select->fetch(PDO::FETCH_ASSOC);

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
    <h1>Modifier la ville</h1>
    <?php
        if (isset($message)){
            echo '<p class="centrer">'.$message.'</p>';
        }
    ?>
    <form method="post" action="">
        <p><input type="text" name="ville" value="<?=$data['ville']?>"></p>
        <p><input type="text" name="habitant" value="<?= $data['habitant']?>"></p>

        <input type="hidden" name="villeID" value="<?= $_GET['villeID'];?>"/>
        <p class="centrer"><input type="submit" name="valider" value="Modifier" ></p></form>


</div>



</body>
</html>

<?php
