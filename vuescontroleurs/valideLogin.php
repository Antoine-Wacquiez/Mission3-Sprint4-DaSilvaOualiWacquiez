<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$login = htmlspecialchars($_POST['username']);
$login = trim($login);

$lePdo = connexionBDD();

if (strlen($login) > nbCaractereLogin($lePdo)) {
    echo "La taille de votre login est trop longue (10 caractères max), désolé...";
    $formatLoginOk = FALSE;
    echo "Votre saisie ne correspond pas au format de login valide.";
} else {
    echo "Votre saisie correspond au format de login valide.";
}
