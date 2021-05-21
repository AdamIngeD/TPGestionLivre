<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php    //connexion à la BD gestion personne      
        
        /*
        $connect=mysqli_connect("localhost","root","",'gestion_livre'); 
        if($connect)     
            echo "connexion réussite".'</br>'; 
        else     //mysli_connect_error affiche un message d'erreur en ce qui concerne la connexion à la base echo "echec de connexion" 
            mysqli_connect_error().'</br>';


        $req ="insert into livre(titre,auteur,date_creation)values(?,?,?)"; //Préparation de la requête 
        $res=mysqli_prepare($connect,$req);

        //liaison des paramètres 
        /* $var=mysqli_stmt_bind_param($res, 'ssi' ,$titre, $auteur,$date_creation); 
        $nom='Lege'; 
        $prenom='Capine'; 
        $age=79; */

        /*
        //exécution de la requête 
        $var=mysqli_stmt_execute($res);  
        if($var==false)      
            echo "echec de l'exécution de la requête".'</br>'; 
        else 
            echo " La Personne est enregistrée".'</br>';

        //fermer la requete préparée  
        mysqli_stmt_close($res); //deconnexion de la base de données  
        if(mysqli_close($connect))         
            echo "deconnexion réussite".'</br>'; 
        else 
            echo "echec de deconnexion".'</br>';  

        echo  '</br>';  
        echo  '</br>';  
        echo  '</br>';  */
        
function ajoutLivre($name) {

    $req="insert into livre (titre) values (?)";
    $connect=connexion();
    $res=mysqli_prepare($connect, $req);
    $var= mysqli_stmt_bind_param($res, 's', $nom);
    $nom=$name;
    $var= mysqli_stmt_execute($res); //execution de la requête
    if($var==false) echo "echec execution requête.<br/>".mysqli_stmt_error();
    else echo "Livre enregistré<br/>";
    mysqli_stmt_close($res);
}

function verifEdition($nom, array $livre){
    if(preg_match("#^[A-Z]([A-Za-z])+$#", $nom)){
        $sql = "INSERT INTO edition (nom, id) VALUES (?, ?)";
        $connect=connexion();
    }
$res = mysqli_prepare($connect, $sql);
//liaison des paramètres
$var = mysqli_stmt_bind_param($res, 'si', $noms, $id);
$noms=$nom;
foreach($livre as $id){
    $var = mysqli_stmt_execute($res); //execution de la requête
}
if($var==false) echo "echec execution requête.<br/>".mysqli_stmt_error();
else echo "Edition enregistrée<br/>";
mysqli_stmt_close($res);
}

function afficheLivre($nomA){
    $connect = connexion();
    $req = "select distinct l.titre from livre l join edition e on l.id=e.id where e.nom = ?";
    //Préparation de la requête
    $res = mysqli_prepare($connect, $req);
    //liaison des paramètres
    $var= mysqli_stmt_bind_param($res, 's', $nom);
    $nom=$nomA;
    $var= mysqli_stmt_execute($res); //execution de la requête
    if($var==false) echo "echec execution requête.<br/>";
    else {
        //Association des variables de résultats
        $var = mysqli_stmt_result($res, $titre);
        //lecture des valeurs
        
    }
    mysqli_stmt_close($res);
}
        
        ?>
    </body>
</html>