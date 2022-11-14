<?php

    include_once '../modeles/mesFonctionsAccesBDD.php';
    $lePdo = connexionBDD();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $testLoginMdp = testLoginMdp($lePdo, $username, $password);
    if ($testLoginMdp == true) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        ajoutconnexion($lePdo,$username);
        header('Location:menu.php');
    } else {
        header('Location: formConnexion.php?erreur=2'); // utilisateur ou mot de passe vide
        echo "n existe pas ";
    }


?>