<?php

$mail = isset($_POST["mail"])? $_POST["mail"] : "";


//identifier le nom de base de données
$database = "projetweb";
//connectez-vous dans votre BDD

$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


 //si le BDD existe, faire le traitement
if ($db_found) {
      
        $nom_image = "";

        $sql = "SELECT nom_image FROM professeur WHERE mail = '$mail'";
        $result = mysqli_query($db_handle, $sql);
        
        while ($data = mysqli_fetch_assoc($result)) {
        
                $nom_image = $data['nom_image'];
         }

        $sql2 = "DELETE FROM output_images WHERE imageName = '$nom_image'";
        $result2 = mysqli_query($db_handle, $sql2);

        $sql3 = "DELETE FROM professeur WHERE mail = '$mail'";
        $result3 = mysqli_query($db_handle, $sql3);
        
        echo "Employé bien supprimé !";

        
}


?>
