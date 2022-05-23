<?php
    //On reprend ce que l'on a fait au TD/TP6
    echo "<meta charset=\"UTF-8\">";
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);


//Si la Base de données existe
if ($db_found) {
    
    $sql = "SELECT nom FROM professeur WHERE departement like '%Maths%'";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
    echo "nom : " . $data['nom'] . '<br>';


    echo "</table>";
    } 
    }   
    else {
    echo "<br>Database not found";
    }
//fermer la connexion
mysqli_close($db_handle);
?>