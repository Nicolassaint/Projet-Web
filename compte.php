<?php session_start();?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_connexion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="script_connexion.js" defer></script>

    <script>

        $(document).ready(function () {

            //Tentative de récuperer la variable session afin de supprimer l'onglet inscription pour les profs et admins.
            var utilisateur = '<?php echo $_SESSION["type_utilisateur"]; ?>';
            
            //console.log(utilisateur);

            if((utilisateur == "prof")||(utilisateur == "admin"))
            {
                $("#inscription").hide();
                $("#connexion").hide();

            }
        });

    </script>
    <title>Mon compte</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>


        <div class="tab-body" data-id="connexion">
            <form action="connexion.php" method="post">
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" class="input" placeholder="Adresse Mail" name="login">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Mot de Passe" type="password" class="input" name="password">
                </div>
                <button class="btn" type="submit">Connexion</button>
            </form>
        </div>

        <div class="tab-body" data-id="inscription">
            <form action="inscription.php" method="post">
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" class="input" placeholder="Adresse Mail" name="login">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" placeholder="Mot de Passe" name="password">
                </div>
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="text" class="input" placeholder="Nom" name="nom">
                </div>
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="text" class="input" placeholder="Prenom" name="prenom">
                </div>
                
                <button class="btn" type="submit">Inscription</button>
            </form>
        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="connexion" href="javascript:void(0)" id="connexion">Connexion</a>
            <a class="tab-link" data-ref="inscription" href="javascript:void(0)" id="inscription">Inscription</a>
        </div>
    </div>
</body>

</html>