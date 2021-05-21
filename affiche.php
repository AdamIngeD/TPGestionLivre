<?php
include('fonctions.php');
$connect = connexion();
$sql = "select nom from edition";
$ress = mysqli_query($connect, $sql);
echo "<form action=affiche.php method=POST>";
echo "Nom de l'édition : ";
echo "<select name=name required>";
    if(mysqli_num_rows($ress) > 0){
        //Récupérer des infos
        while($row = mysqli_fetch_assoc($res)){
            echo "<option>".$row["nom"]."</option>";
        }
    }
echo "</select><input type=submit name=affiche value=Afficher Livre>";
if(isset($_POST["affiche"])){
    afficheLivre($_POST[""]);
}
