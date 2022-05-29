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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link href="prime.css" rel="stylesheet" type="text/css" />

    <?php
    //On reprend ce que l'on a fait au TD/TP6
    echo "<meta charset=\"UTF-8\">";
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    session_start();

    ?>

    <body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid bar">
            <a class="navbar-brand" href="#"><img src="omnes_logo.png" id="droite" alt="omnes_logo" width="300" height="100"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="page.html">ACCUEIL
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="page.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link active" aria-current="page" href="select_prof_rdv.php">PRENDRE UN RENDEZ-VOUS
                        </a>
                    </li>

                </ul>
                <div id="barre_recherche">
                    <form role="search" action="recherche.php" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="recherche">

                
                    <button class="btn btn-outline-success" type="submit" formaction="recherche.php">Search</button>
                    </form>

                </div>

                <button type="button" class="btn btn-outline-light">SE CONNECTER</button>
            </div>
        </div>
    </nav>

    <h2 style="text-align : center;">ENSEIGNANT</h2>

    <div class="container infos">
        <img src="physique.png" width="250" height="200">
    </div>


    <div class="section">


    <?php

    //Si la Base de données existe
    if ($db_found) {

        $sql = "SELECT nom,prenom,departement,salle,tel,mail,nom_image,laboratoire,profession FROM professeur WHERE nom like '%$_GET[nom]%'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<div style='text-align : center';>";
            echo "Prénom : " . $data['prenom'] . '<br>';
            echo "Nom : " . $data['nom'] . '<br>';
            echo "Département : " . $data['departement'] . '<br>';
            echo "Bureau : " . $data['salle'] . '<br>';
            echo "Tel : " . $data['tel'] . '<br>';
            echo "Mail    : " . $data['mail'] . '<br><br>';

            $_SESSION['profession'] = $data['profession'];
            $_SESSION['mail'] = $data['mail'];
            $image = "";
            $image = $data['nom_image'];

            echo '<span><a href="index_cal.php?mail=' . $data['mail'] . '">prendre un rdv</a><span><br>';
            echo "</div>";
           


            echo "<br><b>CV</b><br>";
            $nom = $data['nom'];
            $chercheur = $data['laboratoire'];
            $filename = "$nom.xml";
            $xmlElement = simplexml_load_file($filename);
            echo "<br>Formations : " . $xmlElement->formations;
            echo "<br>Expériences : " . $xmlElement->experiances;

            if ($chercheur != "") {
                echo "<br>Publications : " . $xmlElement->publications;
            }
            echo "<br>";
            if ($image != "") {
                $sql2 = "SELECT imageType,imageData FROM output_images WHERE imageName = '$image' ";
                $result2 = mysqli_query($db_handle, $sql2) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($db_handle));
                $row = mysqli_fetch_array($result2);

                echo '<br><img src="data:' . $row["imageType"] . ';base64,' . base64_encode($row["imageData"]) . '"width="14% />';
            }

        }
    } else {
        echo "<br>Database not found";
    }
    //fermer la connexion
    mysqli_close($db_handle);
    ?>

</div>



    <div class="footer">

        
        </div>

</body>