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


            $("#supression_admin").hide();
            $("#ajout_admin").hide();
            $("#admin_infos_relations").hide();
   
            $("#suppression").click(function () {
                $("#supression_admin").show();
                $("#ajout_admin").hide();
                $("#admin_infos_relations").hide();

            });

            $("#ajout").click(function () {
                $("#supression_admin").hide();
                $("#ajout_admin").show();
                $("#admin_infos_relations").hide();

            });

            $("#infos_inter").click(function () {
                $("#supression_admin").hide();
                $("#ajout_admin").hide();
                $("#admin_infos_relations").show();
            });


        });


    </script>
</head>

<body>
    <!-- Here is the wrapper area -->
    <div id="wrapper">

        <div id="header">

            <h1 id="titre">Admin Omnes Scolaire</h1>
            <img src="omnes_logo.png" id="droite" alt="omnes_logo" width="300" height="100">

        </div>


        <div id="navigation_admin">

            <a href="index.html"><input type="button" value="Deconnexion" class="bouton_accueil"></a>
            <input type="button" value="Ajout personnel" class="bouton_accueil" id="ajout">
            <input type="button" value="Suppression personnel" class="bouton_accueil" id="suppression">
            <input type="button" value="Exportation CV" class="bouton_accueil" id="exporationCV">
            <input type="button" value="Relations Internationales" class="bouton_accueil" id="infos_inter">
            <input type="button" value="Disponibilités personnel" class="bouton_accueil" id="dispo_personnel">
            <form action="admin_infos.php" method="POST">
                <input type="submit" value="Votre compte" class="bouton_accueil" id="votre_compte">
            </form>
        </div>

        <form action="admin_suppression.php" method="post">

            <div id="supression_admin" class="admin">

                <div id="encadrement_recherche">
                    <input type="text" placeholder="Email de l'employé" id="barre_recherche" name="mail">
                    <input type="submit" value="Supprimer" class="bouton_recherche">
                    <div id="slider"><img src="loupe.jpg" width="50" height="50" id="loupe"></div>

                </div>

            </div>
        </form>

        <form action="admin_infos_relations.php" method="post">

            <div id="admin_infos_relations" class="admin">

                <div id="encadrement_recherche">
                    <br><h2 style="color: white;">Bureau Relation Internationale</h2>
                    <input type="text" placeholder="Salle" id="barre_recherche" name="salle">
                    <input type="text" placeholder="Téléphone" id="barre_recherche" name="telephone">
                    <input type="email" placeholder="E-mail" id="barre_recherche" name="mail">

                    <input type="submit" value="Modifier" class="bouton_recherche">

                </div>

            </div>
        </form>

        <form action="admin_ajout.php" method="post" enctype="multipart/form-data">

            <div id="ajout_admin" class="admin">

                <div id="encadrement_recherche">

                    <input type="text" placeholder="Nom" id="barre_recherche" name="nom">
                    <input type="text" placeholder="Prénom" id="barre_recherche" name="prenom">
                    <input type="text" placeholder="Téléphone" id="barre_recherche" name="telephone">
                    <input type="email" placeholder="E-mail" id="barre_recherche" name="mail">
                    <input type="text" placeholder="Mot de Passe" id="barre_recherche" name="password">
                    <br><br><label style="color: white;">Photo : </label>
                    <input type="file" placeholder="Fichier photo" accept=".jpg,.png" name="photo" id="Photo"><br>

                    <input type="text" placeholder="Formations"  name="formations" id="barre_recherche">
                    <input type="text" placeholder="Expériances"  name="experiances" id="barre_recherche">
                    <input type="text" placeholder="Publications"  name="publications" id="barre_recherche">

                    <input type="text" placeholder="Profession" id="barre_recherche" name="profession">
                    <input type="text" placeholder="Salle" id="barre_recherche" name="salle">
                    <input type="text" placeholder="Département" id="barre_recherche" name="departement">
                    <input type="text" placeholder="Laboratoire" id="barre_recherche" name="laboratoire">

                    <input type="submit" value="Ajouter" class="bouton_recherche">
                </div>

            </div>
        </form>



</body>

</html>