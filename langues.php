<?php

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le BDD existe, faire le traitement
if ($db_found) {

    $sql = "SELECT * from langues";

    $result = mysqli_query($db_handle, $sql);

   
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Langue" . "</th>";
        echo "<th>" . "Contact du Reponsable" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['nom'] . "</td>";
            echo "<td>" . $data['mail_prof'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
}

    ?>