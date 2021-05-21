<?php
$connect= mysqli_connect("localhost","root","","gestion_livre");

if(isset($_POST["titre"]) && isset($_POST["auteur"]) && isset($_POST["date"]) )
{
    $titre = mysqli_real_escape_string($connect,$_POST["titre"]);
	$auteur = mysqli_real_escape_string($connect, $_POST["auteur"]);
	$date = mysqli_real_escape_string($connect, $_POST["date"]);
	$sql = "INSERT INTO livre (titre, auteur, date_creation)
	VALUES ('$titre', '$auteur', '$date')";    
    //exécuter la requête d'insertion
	if (mysqli_query($connect, $sql)) {
    	echo "Le livre a été ajouté  avec succès";
	} else {
    	echo "Erreur d'insertion " ;	
}
}



?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="ajout_livre.php">Afficher liste des livres</a>;
        <a href="ajoutEdition.php">Afficher liste des livres</a>;
        <form method="POST">
            <fieldset>
                <legend>Ajouter un livre</legend>
                <table>
                    <tr>
                        <td><label for="titre">Titre du livre :</label></td>
                        <td><td><input type="text" name="titre" id="titre" required/></td>
                    </tr>

                    <tr>
                        <td><label for="auteur">Auteur :</label></td>
                        <td><td><input type="text" name="auteur" id="auteur" required/></td>
                    </tr>

                    <tr>
                        <td><label for="date">Date de création :</label></td>
                        <td><input type="date" name="date" id="date" required/></td>
                    </tr>
                    
                    <tr><td><input type="submit" name="ajouter" id="send" value="Ajouter"></td></tr>

                </table>
            </fieldset>

        </form>
        
        
        

    </body>
</html>

<?php
include('fonctions.php');
//$connect=connexion();
if(isset($_POST["Ajouter livre"])){
    ajoutLivre($_POST["nom"]);
}
?>