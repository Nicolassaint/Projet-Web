<?php

session_start();

$login = isset($_POST["login"])? $_POST["login"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$utilisateur = "";
$utilisateur = $_SESSION["type_utilisateur"];

echo "type : ".$utilisateur."<br>";

 //si le BDD existe, faire le traitement
if ($db_found) {

    if ($utilisateur == "client")
    {
      
        $sql = "INSERT into etudiant values('$nom','$prenom','$login','$password')";
        $result = mysqli_query($db_handle, $sql);
        echo "Ajout client reussi, valeurs : ".$nom."  ".$prenom."   ".$login."   ".$password;

    }


    else{                
         echo "Problème d'inscription client !";
    }
 
}


?>
