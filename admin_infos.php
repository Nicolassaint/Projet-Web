<?php

session_start();

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$adresse_admin = $_SESSION["adresse_admin"];

 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "SELECT * from admin WHERE login = '$adresse_admin'";
        $result = mysqli_query($db_handle, $sql);


        while ($data = mysqli_fetch_assoc($result)) {
            
            echo "Informations sur votre compte : <br><br>";
            echo "Nom : " . $data['nom'];
            echo "<br>Prénom : " . $data['prenom'];
            echo "<br>Courriel : " . $data['login']; 

        }
}


?>
