<?php

    include_once '../modeles/mesFonctionsAccesBDD.php';
    session_start();
    $lePdo = connexionBDD();
    $username=$_POST['username'];
    $password=$_POST['password'];

    $testLoginMdp = testLoginMdp($lePdo, $username, $password);
    if ($testLoginMdp == true) {
        $_SESSION['username'] = $username;
        header('Location: menu.php');
    } else {
        header('Location: formConnexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }



?>