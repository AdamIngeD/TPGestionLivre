<?php
$connect= mysqli_connect("localhost","root","","gestion_livre");

if(isset($_GET['id'])){
    $getid = intval($_GET['id']);
    $req = "DELETE FROM livre WHERE id = $getid";
    $res=mysqli_query($connect, $req);
}
else
{echo "pas de id";}

header('Location: ajout_livre.php');
?>