<?php

session_start(); 

?>

<!DOCTYPE html>

<head>
    <title>OMNES SCOLAIRE</title>
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
                   
                    
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">DOSSIER
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="modif_client.php">INFORMATION
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="chat.php">COMMUNICATION
                        </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="client_infos.php">VOTRE COMPTE
                        </a>
                    </li>

                </ul>
                
                
        </div>
    </nav>

<h3>Vous êtes connecté ! </h3>
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

            <a href="page.html"><input type="button" value="Accueil" class="bouton_accueil"></a>
            <input type="button" value="Dossier" class="bouton_accueil" id="dossier">
            <input type="button" value="Coordonnées" class="bouton_accueil" id="coordonnées">
            <a href="chat.php"><input type="button" value="Communication" class="bouton_accueil" id="communication"></a>
            <form action="client_infos.php" method="POST">
                <input type="submit" value="Votre compte" class="bouton_accueil" id="votre_compte">
            </form>
        </div>




</body>

</html>