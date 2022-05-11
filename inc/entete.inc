<?php
require('../modeles/mesFonctionsAccesBDD.php');
session_start();
?>
<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset="UTF-8">
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style.css">


    <a href="../vuescontroleurs/accueil.php"> <img src="../images/logosite.jpg" alt="Le logo du site"></a> 
    <nav>

        <ul class="container">

            <li>
                <a href="../vuescontroleurs/accueil.php">ACCUEIL </a>
            </li>

            <li class='dropdown'>
                <a href='../vuescontroleurs/listedesbiens.php'>LISTE DES BIENS  </a>
            </li>
            <li>
                <a href='../autres/contact.php'>CONTACT </a>
            </li>
            <li>
                <a href='../vuescontroleurs/formConnexion.php'>CONNEXION </a>
            </li>

        </ul>

    </nav>