<?php

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le BDD existe, faire le traitement
if ($db_found) {

    $sql = "SELECT * from univ_partenaires";

    $result = mysqli_query($db_handle, $sql);

   
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Nom" . "</th>";
        echo "<th>" . "Adresse" . "</th>";
        echo "<th>" . "Contact" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['adresse'] . "</td>";
            echo "<td>" . $data['contact'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
}

    ?>