<?php

$recherche = isset($_POST["recherche"]) ? $_POST["recherche"] : "";

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$erreur = "";

if ($recherche == "") {
    $erreur = "Le champ Nom est vide";
}



//si le BDD existe, faire le traitement
if (($db_found) && ($erreur == "")) {

    $sql = "SELECT * from professeur WHERE nom = '$recherche'";
    $sql2 = "SELECT * from professeur WHERE departement = '$recherche'";
    $sql3 = "SELECT * from univ_partenaires WHERE nom = '$recherche'";
    $sql4 = "SELECT * from professeur WHERE laboratoire = '$recherche'";

    $result = mysqli_query($db_handle, $sql);

    if (mysqli_num_rows($result)>0) {
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Nom" . "</th>";
        echo "<th>" . "Prenom" . "</th>";
        echo "<th>" . "Téléphone" . "</th>";
        echo "<th>" . "mail" . "</th>";
        echo "<th>" . "Photo" . "</th>";
        echo "<th>" . "Profession" . "</th>";
        echo "<th>" . "Salle" . "</th>";
        echo "<th>" . "Departement" . "</th>";
        echo "<th>" . "Laboratoire" . "</th>";

        echo "</tr>";
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['prenom'] . "</td>";
            echo "<td>" . $data['tel'] . "</td>";
            echo "<td>" . $data['mail'] . "</td>";
            echo "<td>" . $data['photo'] . "</td>";
            echo "<td>" . $data['profession'] . "</td>";
            echo "<td>" . $data['departement'] . "</td>";
            echo "<td>" . $data['laboratoire'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $result2 = mysqli_query($db_handle, $sql2);

    if (mysqli_num_rows($result2)>0) {
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Nom" . "</th>";
        echo "<th>" . "Prenom" . "</th>";
        echo "<th>" . "Téléphone" . "</th>";
        echo "<th>" . "mail" . "</th>";
        echo "<th>" . "Photo" . "</th>";
        echo "<th>" . "Profession" . "</th>";
        echo "<th>" . "Salle" . "</th>";
        echo "<th>" . "Departement" . "</th>";
        echo "<th>" . "Laboratoire" . "</th>";

        echo "</tr>";
        while ($data = mysqli_fetch_assoc($result2)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['prenom'] . "</td>";
            echo "<td>" . $data['tel'] . "</td>";
            echo "<td>" . $data['mail'] . "</td>";
            echo "<td>" . $data['photo'] . "</td>";
            echo "<td>" . $data['profession'] . "</td>";
            echo "<td>" . $data['departement'] . "</td>";
            echo "<td>" . $data['laboratoire'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    
    $result3 = mysqli_query($db_handle, $sql3);

    if (mysqli_num_rows($result3)>0) {
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Nom de l'établissement" . "</th>";
        echo "<th>" . "Adresse" . "</th>";
        echo "<th>" . "Contact" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result3)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['adresse'] . "</td>";
            echo "<td>" . $data['contact'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $result4 = mysqli_query($db_handle, $sql4);

    if (mysqli_num_rows($result4)>0) {
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Nom" . "</th>";
        echo "<th>" . "Prenom" . "</th>";
        echo "<th>" . "Téléphone" . "</th>";
        echo "<th>" . "mail" . "</th>";
        echo "<th>" . "Photo" . "</th>";
        echo "<th>" . "Profession" . "</th>";
        echo "<th>" . "Salle" . "</th>";
        echo "<th>" . "Departement" . "</th>";
        echo "<th>" . "Laboratoire" . "</th>";

        echo "</tr>";
        while ($data = mysqli_fetch_assoc($result4)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['prenom'] . "</td>";
            echo "<td>" . $data['tel'] . "</td>";
            echo "<td>" . $data['mail'] . "</td>";
            echo "<td>" . $data['photo'] . "</td>";
            echo "<td>" . $data['profession'] . "</td>";
            echo "<td>" . $data['departement'] . "</td>";
            echo "<td>" . $data['laboratoire'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";


    }

    if((mysqli_num_rows($result)==0) && (mysqli_num_rows($result2)==0) && (mysqli_num_rows($result3)==0) && (mysqli_num_rows($result4)==0))
{
    echo "Aucun résultat trouvé pour : ".$recherche." !";
}
}
else{

    echo "Vous devez rentrer quelque chose !";


}



?>
