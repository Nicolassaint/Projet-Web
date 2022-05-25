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
        
            var nom_client = "<?php echo $_SESSION["nom_client"]; ?>";

            if(nom_client == ""){
                $("#informations_client").hide();
            }

            $("#modif_client").hide();

            $("#votre_compte").click(function () {
                $("#informations_client").show();
                $("#modif_client").hide();
            });

            $("#coordonnées").click(function () {
                $("#informations_client").hide();
                $("#modif_client").show();
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
            <input type="button" value="Coordonnées" class="bouton_accueil" id="coordonnées">
            <a href="chat.php"><input type="button" value="Communication" class="bouton_accueil" id="communication"></a>
            <form action="client_infos.php" method="POST">
                <input type="submit" value="Votre compte" class="bouton_accueil" id="votre_compte">
            </form>
        </div>

        <form action="modif_client.php" method="post">

            <div id="modif_client" class="admin">

                <div id="encadrement_recherche">

                    <input type="text" placeholder="Adresse ligne 1" id="barre_recherche" name="adresse1">
                    <input type="text" placeholder="Adresse ligne 2" id="barre_recherche" name="adresse2">
                    <input type="text" placeholder="Ville" id="barre_recherche" name="ville">
                    <input type="text" placeholder="Code postal" id="barre_recherche" name="code_postal">
                    <input type="text" placeholder="Pays" id="barre_recherche" name="pays">
                    <input type="text" placeholder="Numéro de téléphone" id="barre_recherche" name="telephone">
                    <input type="text" placeholder="Carte étudiante" id="barre_recherche" name="carte_etudiante">

                    <input type="submit" value="Modifier" class="bouton_recherche">
                </div>

            </div>
        </form>

        <div id="informations_client">
         

          <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informations client : </b></p><br>

         <p>Nom : <?php echo $_SESSION["nom_client"]; ?></p>
         <p>Prenom : <?php echo $_SESSION["prenom_client"]; ?></p>
         <p>Adresse : <?php //echo $_SESSION["adresse_client"]; ?></p>
         <p>Mail : <?php echo $_SESSION["mail_client"]; ?></p>
         <p>Carte Etudiante : <?php //echo $_SESSION["carte_client"]; ?></p>

    
        </div>


</body>

</html>