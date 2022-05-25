<?php
    //On reprend ce que l'on a fait au TD/TP6
    echo "<meta charset=\"UTF-8\">";
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //include 'index_cal.php';
   // include 'book.php';
    echo $date = $_GET['date'];
    echo $ts=$_GET['time'];



//Si la Base de données existe
if ($db_found) {
   
    $sql = "INSERT INTO `rdv` (`adresse`, `mail_etudiant`, `mail_prof`, `jour`, `heure`, `infos_sup`) VALUES ('', '', '', '$date', '$ts', '')";
    $result = mysqli_query($db_handle, $sql);
    //echo $sql;
    //while ($data = mysqli_fetch_assoc($result)) {
    //echo "prenom : ";

    //echo "date    : " . $data['jour'] . '<br>';
    echo "date : " . $date . '<br>';
    echo "timeslot : " . $ts . '<br>';


    echo "</table>";

    
    } 

       
    else {
    echo "<br>Database not found";
    }
//fermer la connexion
mysqli_close($db_handle);
?>