<?php

$salle = isset($_POST["salle"])? $_POST["salle"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "UPDATE infos_relations_inter SET salle = '$salle', tel = '$telephone', mail = '$mail'";
        $result = mysqli_query($db_handle, $sql);
        echo "Modification réalisée avec succès <br><br>";
        echo "salle : ".$salle;
        echo "<br>telephone : ".$telephone;
        echo "<br>mail : ".$mail;
         
}


?>
