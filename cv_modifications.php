<?php

session_start();

$nom = isset($_POST["nom_employe"])? $_POST["nom_employe"] : "";
$formations = isset($_POST["formations"])? $_POST["formations"] : "";
$experiances = isset($_POST["experiances"])? $_POST["experiances"] : "";
$publications = isset($_POST["publications"])? $_POST["publications"] : "";

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$sql = "SELECT profession from professeur where nom='$nom'";
$result = mysqli_query($db_handle, $sql);

while ($data = mysqli_fetch_assoc($result)) {

$profession = $data["profession"];

}

$xml = new XMLWriter();
$xml->openUri("$nom.xml");
$xml->startDocument('1.0', 'utf-8');

$xml->startElement('CV');
$xml->startElement('formations');
$xml->writeCdata("$formations");
$xml->endElement();

$xml->startElement('experiances');
$xml->writeCdata("$experiances");
$xml->endElement();

if((($publications != "")) && ($profession == "chercheur")){
$xml->startElement('publications');
$xml->writeCdata("$publications");
$xml->endElement();
}

$xml->endElement(); 
$xml->flush(); 

echo "Cv bien modifié !";


?>