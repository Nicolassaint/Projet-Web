<?php

$adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
$adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$code_postal = isset($_POST["code_postal"])? $_POST["code_postal"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$carte_etudiante = isset($_POST["carte_etudiante"])? $_POST["carte_etudiante"] : "";


//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
$mail = $_SESSION["adresse_client"];


 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "UPDATE etudiant SET adresse1 = '$adresse1', adresse2 = '$adresse2', ville = '$ville', code_postal = '$code_postal', pays = '$pays', telephone = '$telephone', carte_etudiante = '$carte_etudiante' WHERE login = '$mail'";
        $result = mysqli_query($db_handle, $sql);
        
        echo "<div style='text-align:center;'>";
        echo "<br><b>Modification réalisée avec succès </b><br><br>";

        echo $sql;
        echo "<br><br>salle : ".$salle;
        echo "<br>telephone : ".$telephone;
        echo "<br>mail : ".$mail;
        echo "</div>";

         
}


?>
