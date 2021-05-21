<?php
include 'fonctions.php';
//Après appel de la page on récupéré l'id du livre en question
if(isset($_GET["id"])){
	//protection de données
	$idm = mysqli_real_escape_string(connexion(),$_GET["id"]);
	$sql = "SELECT * FROM livre WHERE id=$idm";
	$result = mysqli_query(connexion(), $sql);
	if (mysqli_num_rows($result) > 0) {
    	// Récupérer des informations du livre en question qui seront par la suite afficher dans le formulaire en bas
        $row = mysqli_fetch_assoc($result);
        $id=$row["id"];
        $titre=$row["titre"];
        $auteur=$row["auteur"];
        $date=$row["date_creation"];
    }  
        else{
        	//Si erreur envoie de message à la page ajout_livre.php
        $message="le livre est introuvable";
        header("Location:ajout.php?message=$message");
        }
    }
    // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
if(isset($_POST["titre"]) && isset($_POST["auteur"]) && isset($_POST["date"]) ){
    
	$titre = mysqli_real_escape_string(connexion(),$_POST["titre"]);
	$auteur = mysqli_real_escape_string(connexion(), $_POST["auteur"]);
	$date = mysqli_real_escape_string(connexion(), $_POST["date"]);
	$id=mysqli_real_escape_string(connexion(), $_POST["id"]);
        
	$sql = "update  livre set titre='$titre' , auteur='$auteur', date_creation='$date'
     WHERE id=$id";
    //executer le requete de l'update et redirection vers la page ajout_livre.php
	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le livre a été mis à jour avec succes";
	} else {
    	$message = "Erreur de mise à jour " ;
	}
	header("Location:ajout.php?message=$message");
}
        ?>
<!--  Afficher le formulaire rempli par les données du livre récupéré en haut.-->
        <form name="exe" action="modif.php" method="post">
      		<fieldset>
      			<legend>Modifier un livre</legend>
      			<input type="hidden" id="id" name="id" value="<?php if(isset($id)) { echo $id; } ?>"><br/>
      			<label for="titre">Titre du livre</label>
      			<input type="text" id="titre" name="titre" required value="<?php if(isset($titre)) { echo $titre; } ?>"><br/>
      			<label for="auteur">Auteur du livre</label>
      			<input type="text" id="auteur" name="auteur" required value="<?php if(isset($auteur)) { echo $auteur; } ?>"><br/>
      			<label for="date">Date creation</label>
      			<input type="date" id="date" name="date" required value="<?php if(isset($date)) { echo $date; } ?>"><br/>
      			<input Type="submit" value="Modifier">
      		</fieldset>
      </form>
