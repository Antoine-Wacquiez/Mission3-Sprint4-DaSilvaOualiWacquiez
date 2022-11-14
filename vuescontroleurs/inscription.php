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



<body>    
    <?php
    include_once '../modeles/mesFonctionsAccesBDD.php';
    $lePdo = connexionBDD();

    if (isset($_POST['choix1'])) {
        $login = $_POST['login'];
        $mail = $_POST['mail'];
        $codepostal = $_POST['codepostal'];
        $mdp = $_POST['mdp'];
        $HASH = password_hash($mdp,PASSWORD_BCRYPT);
        ajoututilisateur($lePdo, $login, $mail, $codepostal, $HASH);
    }
    ?>

   

    <br>
    <form method="post" action="" onsubmit="if (confirm('Etes-vous sûr de vouloir vous inscrire ?')) {
                return true;
            } else {
                return false;
            }">
         <br>
        <h3>Pour inscrire :</h3>
        <label>Nom d'utilisateur</label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>
        <br><br>            
        <label>Mail</label>
        <input type="mail" placeholder="Entrer le mail" name="mail" required>
        <br><br>
        <label>Code Postal</label>
        <input type="number" placeholder="Entrer le code postal" name="codepostal" required>
        <br><br>
        <label> Mot de passe </label>
        <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>
        <br><br>
        <INPUT type="checkbox" name="choix1" value="1" required> Cochez si appouvé / <a href='../vuescontroleurs/Politiquedonnes.php'>Politique protection des donnnes </a>
        <br><br>
        <input class="submit" type="submit" value="Inscription" />
        <br>
    
    </form>
        </div>

    <br><br><br><br><br><br><br>
  