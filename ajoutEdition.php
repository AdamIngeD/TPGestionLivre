<?php
include('fonctions.php');
$connect = connexion();
if(isset($_POST["AjouterEdition"])){
    //foreach($_POST["auteur"] as $val) echo "la valeur est ".$val;
    verifEdition($_POST['nom'], $_POST['livre']);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercice PHP</title>
    </head>
    <body>
    <form action="ajoutEdition.php" method="POST">
        <fieldset>
            <legend>Ajouter une édition</legend>
            <table>
                <tr><td><label for="nom">Nom de l'édition</label></td>
                    <td><input type="text" id="nom" name="nom" required autofocus></td></tr>
                <tr><td><label for="livre">Livres</label></td>
                    <td><select id="livre" name="livre[]" multiple ="multiple required">
                <?php
                $req = "select * from livre";
                $res = mysqli_query($connect, $req);
                if(mysqli_num_rows($res) > 0){
                    //récupérer des informations
                    while($row = mysqli_fetch_assoc($res)){
                        echo "<option value=".$row["id"].">".$row["titre"]."</option>";
                    }
                }
                ?>
                </select></td></tr>
            </table>
            <input type="submit" name="AjouterEdition" value="Ajouter">
        </fieldset>
    </form>
    <a 
</body>
