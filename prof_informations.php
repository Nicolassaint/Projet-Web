<?php

session_start();

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$adresse_prof = $_SESSION["adresse_prof"];

 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "SELECT * from professeur WHERE mail = '$adresse_prof'";
        $result = mysqli_query($db_handle, $sql);


        while ($data = mysqli_fetch_assoc($result)) {
            


        echo"<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informations employé : </b></p><br>";

         echo"<p>Nom : ".$data['nom']. "</p>";
         echo"<p>Prenom : ".$data['prenom']."</p>";
         echo"<p>Courriel : ".$data['mail']."</p>";
         


        }
}


?>
