
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
    <link href="prime.css" rel="stylesheet" type="text/css" />

    <?php

    //identifier le nom de base de données
    $database = "projetweb";
    //connectez-vous dans votre BDD

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    ?>
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
                    </form>                </div>

                <form action="choix_compte.php" method="post">
                    <input type="submit" class="btn btn-outline-light" value="SE CONNECTER">
                    </form>            </div>
        </div>
    </nav>

    <h2 style ="text-align : center;">Universités partenaires</h2>

   
    <?php
    //si le BDD existe, faire le traitement
if ($db_found) {

    $sql = "SELECT * from univ_partenaires";

    $result = mysqli_query($db_handle, $sql);

   
        

        while ($data = mysqli_fetch_assoc($result)) {
            echo '<div class="container infos">';
            echo "<img src=". $data['image'] ." width='250' height='200'>". '<br>';

            echo '<div class = "relations_internationales">';
                       
            echo "<b>Université : </b><p> " . $data['nom'] ."</p>";
            echo "<b>Adresse : </b> <p>" . $data['adresse'] . "</p>";
            echo "<b>Contact : </b><p>" . $data['contact'] . "</p>";
            echo'</div>';
            
        }
        
    
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
                    href="scolarite@omnes.fr">scolarite@omnes.fr</a><br>
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



