<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset="UTF-8">
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/formulaire.css">
        <title> Formulaire d'inscription  </title>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->

            <form action="verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='SE CONNECTER' >
                
                <a class='lien' href="../vuescontroleurs/accueil.php">Revenir à l'accueil </a>
                <br>
                <a href="inscription.php">Inscription</a>
            </form>
        </div>
    </body>
</html>