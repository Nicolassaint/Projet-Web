<?php

session_start();

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


?>