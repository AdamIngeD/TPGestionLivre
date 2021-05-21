<?php
include('fonctions.php');
$connect = connexion();
$sql = "select ide from edition";
$ress = mysqli_query($connect, $sql);
echo "<form action=supp_edition.php method=POST>";
echo "Identifiant de l'édition : ";
echo "<select id=iden name=iden required>";
    if(mysqli_num_rows($ress) > 0){
        //Récupérer des infos
        while($row = mysqli_fetch_assoc($res)){
            echo "<option>".$row["ide"]."</option>";
        }
    }
echo "</select><input type=submit name=supprimer value=Supprimer>";
if(isset($_POST["supprimer"])){
    $req = "delete from edition where ide = ?";
    //Préparation de la requête
    $res = mysqli_prepare($connect, $req);
    //liaison des paramètres
    $var = mysqli_stmt_bind_param($res, 'i', $iden);
    $iden = $_POST['iden'];
    $var= mysqli_stmt_execute($res); //execution de la requête
    if($var==false) echo "echec execution requête.<br/>";
    else echo "Edition supprimée<br/>";
    mysqli_stmt_close($res);
}
