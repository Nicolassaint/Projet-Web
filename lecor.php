<?php
    //On reprend ce que l'on a fait au TD/TP6
    echo "<meta charset=\"UTF-8\">";
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    session_start();


//Si la Base de données existe
if ($db_found) {
    
    $sql = "SELECT nom,prenom,departement,salle,tel,mail,photo,profession FROM professeur WHERE nom like '%$_GET[nom]%'";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
    echo "prenom : " . $data['prenom'] . '<br>';
    echo "nom : " . $data['nom'] . '<br>';
    echo "departement : " . $data['departement'] . '<br>';
    echo "salle : " . $data['salle'] . '<br>';
    echo "tel : " . $data['tel'] . '<br>';
    echo "mail    : " . $data['mail'] . '<br>';
    echo "profession    : " . $data['profession'] . '<br>';
    echo "photo : " . $data['photo'] . '<br>';
    $_SESSION['profession']=$data['profession'];
    $_SESSION['mail']=$data['mail'];
    echo '<span><a href="index_cal.php">prendre un rdv</a><span><br>';
    //echo '<span><a href="index_cal.php?mail='.$data['mail'].'">prendre un rdv</a><span><br>';


    echo "</table>";
    } 
    }   
    else {
    echo "<br>Database not found";
    }
//fermer la connexion
mysqli_close($db_handle);
?>