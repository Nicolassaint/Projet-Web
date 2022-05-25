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
        
            var nom_prof = "<?php echo $_SESSION["nom_prof"]; ?>";

            if(nom_prof == ""){
                $("#informations_prof").hide();
            }

            $("#votre_compte").click(function () {
                $("#informations_client").show();
            });

        
        });


    </script>
</head>

<body>
    <!-- Here is the wrapper area -->
    <div id="wrapper">

        <div id="header">

            <h1 id="titre">Client Omnes Scolaire</h1>
            <img src="omnes_logo.png" id="droite" alt="omnes_logo" width="300" height="100">

        </div>


        <div id="navigation_admin">

            <a href="index.html"><input type="button" value="Deconnexion" class="bouton_accueil"></a>
            <input type="button" value="Dossier" class="bouton_accueil" id="dossier">
            <input type="button" value="Communication" class="bouton_accueil" id="communication">
            <form action="prof_informations.php" method="POST">
                <input type="submit" value="Votre compte" class="bouton_accueil" id="votre_compte">
            </form>
        </div>


        <div id="informations_prof">
         

          <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informations employé : </b></p><br>

         <p>Nom : <?php echo $_SESSION["nom_prof"]; ?></p>
         <p>Prenom : <?php echo $_SESSION["prenom_prof"]; ?></p>
         <p>Courriel : <?php echo $_SESSION["courriel_prof"]; ?></p>
         

    
        </div>


</body>

</html>