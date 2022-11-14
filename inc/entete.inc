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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <a href="../vuescontroleurs/accueil.php"> <img src="../images/logosite.jpg" alt="Le logo du site"></a> 
    
<?php
    if(isset($_SESSION['username'])){
?>
    
    <nav>
        
        <ul class="container">
            <li>
                <a href="../vuescontroleurs/accueil.php">ACCUEIL </a>
            </li>

              <li class='dropdown'>
                <a href='../vuescontroleurs/listedesbiens.php'>LISTE DES BIENS  </a>
            </li>

            <li>
                <a href='../vuescontroleurs/formModifUtil.php'>Compte</a>
                
            </li>

            <li>
                <a href='../vuescontroleurs/Politiquedonnes.php'>Politique protection des donnnes </a>
            </li>

             <li>
                <a href='../vuescontroleurs/Deconnexion.php'>Deconnexion</a>
            </li>
        </ul>
  <?php  
    } 
   ?>

            <li>
                <a href='../vuescontroleurs/formConnexion.php'>CONNEXION </a>
            </li>

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
                <a href='../vuescontroleurs/inscription.php'>INSCRIPTION </a>
            </li>
            
             <li>
                <a href='../vuescontroleurs/Politiquedonnes.php'>Politique protection des donnnes </a>
            </li>

    </nav>