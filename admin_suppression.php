<?php

$mail = isset($_POST["mail"])? $_POST["mail"] : "";


//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $sql = "DELETE FROM professeur WHERE mail = '$mail'";
        $result = mysqli_query($db_handle, $sql);

        
}


?>
