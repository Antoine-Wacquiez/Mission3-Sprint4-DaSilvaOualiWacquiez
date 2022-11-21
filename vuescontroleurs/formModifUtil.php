<?php
include_once '../inc/entete.inc';
?>

<body>    
    <?php
    include_once '../modeles/mesFonctionsAccesBDD.php';
    $lePdo = connexionBDD();
    
    if (isset($_POST['email'])) {
        $mail = $_POST['email'];
        $codepostal = $_POST['codepostal'];
        $login = $_SESSION['username'];
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){    
        modifutilisateur($lePdo,$mail,$codepostal,$login);
        }
    }

   if (isset($_POST['supprimer'])) {
    supprimerUtilisateur($lePdo,$_SESSION['username']);
    header("Location:Deconnexion.php");
    }

    ?>
    <br>
    <h3>Modifier vos informations :</h3>

    <br>
    <form method="post" action="" onsubmit="if (confirm('Etes-vous sûr de vouloir modifier ces  informations')) {
            return true;
        } else {
            return false;
        }">

        <fieldset>
        <?php 
        $lesinfos = recupinfo($lePdo,$_SESSION['usernamme']);
        ?>
            <label for="email">Quel est le nouvel email ?</label>
            <input type="text" name="email" id="email" value=  <?php echo  $lesinfos["Mail"]; ?> />

            <br><br>
            <label for="codepostal">Quel est le code postal?</label>
            <input type="text" name="codepostal" id="codepostal"  value= <?php $lesinfos["codepostal"] ?> /> 
            <br><br>

        </fieldset>

        <br>

        <input class="submit" type="submit" value="Modifier" />
        <br>
    </form>

    <br><br>
    <form method="post" action="" onsubmit="if (confirm('Etes-vous sûr de vouloir supprimer votre compte ')) {
            return true;
        } else {
            return false;
        }">
        <p> Supprimer votre compte  </p>
            <input class="submit" type="submit" name ="supprimer" value="Supprimer"/> 
        <br>
    </form>

    <br><br>
    
    <form action="fichier.php" method="post">
        <input type="submit" value="Télécharger sous JSON" />
    </form>

    <form action=".php" method="post">
        <input type="submit" value="Télécharger sous HASH" />
    </form>
    
    

    <br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include_once '../inc/piedDePage.inc';
    ?>