<?php
include 'fonctions.php';
$connect= connexion();
if(isset($_POST["titre"]) && isset($_POST["auteur"]) && isset($_POST["date"]) )
{
    $titre = mysqli_real_escape_string(connexion(),$_POST["titre"]);
	$auteur = mysqli_real_escape_string(connexion(), $_POST["auteur"]);
	$date = mysqli_real_escape_string(connexion(), $_POST["date"]);
	$sql = "INSERT INTO livre (titre, auteur, date_creation)
	VALUES ('$titre', '$auteur', '$date')";    
    //exécuter la requête d'insertion
	if (mysqli_query(connexion()
                , $sql)) {
    	echo "Le livre a été ajouté  avec succès";
	} else {
    	echo "Erreur d'insertion " ;	
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exercice PHP</title>
	<meta charset="utf-8">
</head>
<body>
      	<table>
      	<tr>
      	<th>id</th>
      	<th>titre</th>
      	<th>auteur</th>
      	<th>date</th>
      	<th colspan="2">Opérations</th>
      	</tr>
      	
      	<!-- Récupération de la liste des livres  -->
      	<?php
     	 $sql = "SELECT * FROM livre";
	$result = mysqli_query(connexion(), $sql);           
	if (mysqli_num_rows($result) > 0) {
    	// Parcourir les lignes de résultat
    	while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"]. "</td><td>" . $row["titre"]. 
             "</td><td>" . $row["auteur"]."</td><td>" . $row["date_creation"] 
        ."</td><td><a href=\"modif.php?id=".$row["id"]."\">Modifier</a></td>"
        ."</td><td><a href=suppr.php?id=".$row["id"]. ">Supprimer</a></td></tr>";
    	}
    // Le lien Modifier envoie vers la page modif.php avec l'id du livre
   // Le lien Supprimer envoie vers la page supp.php avec l'id du livre

	} 
	?>	
   </table> 
</body>
</html>