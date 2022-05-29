<!DOCTYPE html>

<head>
    <link href="prime.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="prime.css" rel="stylesheet" type="text/css" />

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid bar">
            <a class="navbar-brand" href="#"><img src="omnes_logo.png" id="droite" alt="omnes_logo" width="300"
                    height="100"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="page.html">ACCUEIL
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="page.html" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            TOUT PARCOURIR
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="enseignements.php">L'ENSEIGNEMENT</a></li>
                            <li><a class="dropdown-item" href="la_recherche.php">LA RECHERCHE</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="relations_inter.php">RELATION INTERNATIONALE</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">PRENDRE UN RENDEZ-VOUS
                        </a>
                    </li>
                </ul>
                <div id="barre_recherche">
                    <form role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                    </form>
                    <form>
                        <button class="btn btn-outline-success" type="submit" formaction = "recherche.php">Search</button>
                    </form>                  </div>

                <form action="choix_compte.php" method="post">
                    <input type="submit" class="btn btn-outline-light" value="SE CONNECTER">
                    </form>
            </div>
        </div>
    </nav>
        <div style = "text-align : center">
    <h3> Résultats de votre recherche </h3>
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
        
        

        
        while ($data = mysqli_fetch_assoc($result)) {
            echo" <p>Nom : ".$data['nom']."</p>";
        echo"<p>Prenom : ".$data['prenom']."</p>";
        echo"<p>Téléphone: ".$data['tel']."</p>";
        echo"<p>Mail : ".$data['mail']."</p>";
       echo"<p>Profession : ".$data['profession']."</p>";
       echo"<p>Bureau : ".$data['salle']."</p>";
       echo"<p>Departement : ".$data['departement']."</p>";
       echo"<p>Laboratoire : ".$data['laboratoire']."</p>";
        }
    }

    $result2 = mysqli_query($db_handle, $sql2);

    if (mysqli_num_rows($result2)>0) {
        
        while ($data = mysqli_fetch_assoc($result2)) {
            echo" <p>Nom : ".$data['nom']."</p>";
            echo"<p>Prenom : ".$data['prenom']."</p>";
            echo"<p>Téléphone: ".$data['tel']."</p>";
            echo"<p>Mail : ".$data['mail']."</p>";
           echo"<p>Profession : ".$data['profession']."</p>";
           echo"<p>Bureau : ".$data['salle']."</p>";
           echo"<p>Departement : ".$data['departement']."</p>";
           echo"<p>Laboratoire : ".$data['laboratoire']."</p>";
        }
    }

    
    $result3 = mysqli_query($db_handle, $sql3);

    if (mysqli_num_rows($result3)>0) {
        
        while ($data = mysqli_fetch_assoc($result3)) {
            
            echo" <p>Nom de l'établissement: ".$data['nom']."</p>";
            echo"<p>Adresse : ".$data['adresse']."</p>";
            echo"<p>Contact: ".$data['contact']."</p>";
        
        }
    }

    $result4 = mysqli_query($db_handle, $sql4);

    if (mysqli_num_rows($result4)>0) {
        

   
        while ($data = mysqli_fetch_assoc($result4)) {
            echo" <p>Nom : ".$data['nom']."</p>";
            echo"<p>Prenom : ".$data['prenom']."</p>";
            echo"<p>Téléphone: ".$data['tel']."</p>";
            echo"<p>Mail : ".$data['email']."</p>";
           echo"<p>Profession : ".$data['profession']."</p>";
           echo"<p>Bureau : ".$data['salle']."</p>";
           echo"<p>Departement : ".$data['departement']."</p>";
           echo"<p>Laboratoire : ".$data['laboratoire']."</p>";
        }


    }

    if((mysqli_num_rows($result)==0) && (mysqli_num_rows($result2)==0) && (mysqli_num_rows($result3)==0) && (mysqli_num_rows($result4)==0))
{
    echo "<p>Aucun résultat trouvé pour : ".$recherche." !</p>";
}
}
else{

    echo "<p>Vous devez rentrer quelque chose !</p>";


}
?>

 
<div class="footer">

<div>
    <p> 37 Quai Grenelle, 75015 Paris </p>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.369423144615!2d2.2842394155508656!3d48.85116550916967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670049543178d%3A0x400dcd31a8b1ba2a!2s43%20Quai%20de%20Grenelle%2C%2075015%20Paris!5e0!3m2!1sen!2sfr!4v1653224205532!5m2!1sen!2sfr"
        width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
</div>

<div>

    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Contactez-nous !</b><br><br>Mail : <a
            href="mailto:scolarite@omnes.fr">scolarite@omnes.fr</a><br>
        Tél : <a href="01 30 62 78 62">01 30 62 78 62</a></p>

</div>

<div>

    <p>
        Site créé par :
        <li>Lise CHANTHAPHASOUK</li>
        <li>Louise Poirey </li>
        <li>Nicolas Saint</li>
        <li>Roy Sfeir</li>
        <li>TD06 - ING3</li>

    </p>

</div>

</body>


</html>









