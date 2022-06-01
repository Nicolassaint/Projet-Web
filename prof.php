<?php

session_start(); 

?>

<!DOCTYPE html>

<head>
    <title>OMNES SCOLAIRE</title>
    <meta charset="utf-8" />
    <link href="prime.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>

        $(document).ready(function () {
        
        
        });


    </script>
</head>

<body>
    <!-- Here is the wrapper area -->
    <div id="wrapper">

        <div id="header">

            <h1 id="titre">Employé Omnes Scolaire</h1>
            <img src="omnes_logo.png" id="droite" alt="omnes_logo" width="300" height="100">

        </div>


        <div id="navigation_admin">

            <a href="page.html"><input type="button" value="Deconnexion" class="bouton_accueil"></a>
            <input type="button" value="Dossier" class="bouton_accueil" id="dossier">
            <a href ="chat.php"><input type="button" value="Communication" class="bouton_accueil" id="communication"></a>
            <form action="prof_informations.php" method="POST">
                <input type="submit" value="Votre compte" class="bouton_accueil" id="votre_compte">
            </form>
        </div>



    </div>
</body>

</html>