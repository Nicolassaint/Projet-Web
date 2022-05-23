<?php


session_start();

$utilisateur = "client";

if (isset($_POST['bouton_client'])) { 
    $utilisateur = "client";
} 

if (isset($_POST['bouton_prof'])) { 
    $utilisateur = "prof";
 } 

if (isset($_POST['bouton_admin'])) { 
    $utilisateur = "admin";
 } 

 $_SESSION["type_utilisateur"]=$utilisateur;

 header('Location: connexion.html');
 exit();


?>