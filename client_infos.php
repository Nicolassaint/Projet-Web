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
            

            echo "<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informations client : </b></p><br>";

        echo" <p>Nom : ".$data['nom']."</p>";
        echo"<p>Prenom : ".$data['prenom']."</p>";
       // echo"<p>Adresse : ".$data['adresse_client']."</p>";
        echo"<p>Mail : ".$data['login']."</p>";
       // echo"<p>Carte Etudiante : ".$data['carte_client']."</p>";

        }
}


?>
