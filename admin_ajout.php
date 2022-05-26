<?php


$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";

$formations = isset($_POST["formations"])? $_POST["formations"] : "";
$experiances = isset($_POST["experiances"])? $_POST["experiances"] : "";
$publications = isset($_POST["publications"])? $_POST["publications"] : "";

$profession = isset($_POST["profession"])? $_POST["profession"] : "";
$salle = isset($_POST["salle"])? $_POST["salle"] : "";
$departement = isset($_POST["departement"])? $_POST["departement"] : "";
$laboratoire = isset($_POST["laboratoire"])? $_POST["laboratoire"] : "";


$xml = new XMLWriter();
$xml->openUri('cv.xml');
$xml->startDocument('1.0', 'utf-8');

$xml->startElement('CV');
$xml->writeAttribute('mail', "$mail");

$xml->startElement('formations');
$xml->writeCdata("$formations");
$xml->endElement();

$xml->startElement('experiances');
$xml->writeCdata("$experiances");
$xml->endElement();

if($publications != ""){
$xml->startElement('publications');
$xml->writeCdata("$publications");
$xml->endElement();
}

$xml->endElement();




//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "INSERT INTO professeur VALUES('$nom','$prenom','$telephone','$mail','$password','$photo','$profession','$salle','$departement','$laboratoire')";
        $result = mysqli_query($db_handle, $sql);
        echo "Employé ajouté avec succès !";
       // echo $sql;
 
}


?>
