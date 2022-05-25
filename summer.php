<?php

//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le BDD existe, faire le traitement
if ($db_found) {

    $sql = "SELECT * from summer";

    $result = mysqli_query($db_handle, $sql);

   
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "Unvisersités proposant des summer schools" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['univ'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
}

    ?>