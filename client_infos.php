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
            

            $_SESSION["nom_client"]=$data['nom'];
            $_SESSION["prenom_client"]=$data['prenom'];
            $_SESSION["mail_client"]=$data['login'];

            header('Location: client.php');
            exit();


        }
}


?>