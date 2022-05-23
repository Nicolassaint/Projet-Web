<?php

session_start();

$login = isset($_POST["login"])? $_POST["login"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$utilisateur = "";
$utilisateur = $_SESSION["type_utilisateur"];

 //si le BDD existe, faire le traitement
if ($db_found) {

    if ($utilisateur == "client")
    {
      
        $sql = "SELECT login , mdp FROM etudiant";

        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {

            if(($data["login"] == $login) && ($data["mdp"] == $password))
            {
                echo "Connexion client reussie.";

            }
            else{                
                echo "Connexion échouée, le login ou mot de passe est incorrect !";
           }
        }

    }

    else if ($utilisateur == "prof")
    {
      
        $sql = "SELECT mail , mdp FROM professeur";

        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {

            if(($data["mail"] == $login) && ($data["mdp"] == $password))
            {
                echo "Connexion prof reussie.";

            }
            else{                
                echo "Connexion échouée, le login ou mot de passe est incorrect !";
           }
        }

    }

    else if ($utilisateur == "admin")
    {
      
        $sql = "SELECT login , mdp FROM admin";

        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {

            if(($data["login"] == $login) && ($data["mdp"] == $password))
            {
                echo "Connexion admin reussie.";

            }
            else{                
                echo "Connexion échouée, le login ou mot de passe est incorrect !";
           }
        }

    }

    
 
}






?>
