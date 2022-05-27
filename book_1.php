<?php

    session_start();

    //On reprend ce que l'on a fait au TD/TP6
    echo "<meta charset=\"UTF-8\">";
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    //include 'index_cal.php';
   // include 'book.php';
    $date = $_GET['date'];
    $ts=$_GET['time'];
    $mail = $_SESSION["mail"];
    $mail_e=$_SESSION["adresse_mail"];


//Si la Base de données existe
if ($db_found) {
   
    $sql = "INSERT INTO `rdv` (`mail_etudiant`, `mail_prof`, `jour`, `heure`) VALUES ('$mail_e', '$mail', '$date', '$ts')";
    $result = mysqli_query($db_handle, $sql);
    //echo $sql;
    //while ($data = mysqli_fetch_assoc($result)) {
    echo "Votre adresse mail : ". $mail_e."<br>";
    echo "Adresse mail du professeur: ". $mail."<br>";
    //echo "date    : " . $data['jour'] . '<br>';
    echo "date : " . $date . '<br>';
    echo "heure : " . $ts . '<br>';


    echo "</table>";

    
    } 

       
    else {
    echo "<br>Database not found";
    }
//fermer la connexion
mysqli_close($db_handle);
?>