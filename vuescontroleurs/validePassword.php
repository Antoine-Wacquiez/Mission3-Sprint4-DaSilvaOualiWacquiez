<?php

include_once '../modeles/mesFonctionsAccesBDD.php';

$mdp = htmlspecialchars($_POST['password']);
$mdp = trim($mdp);

$lePdo = connexionBDD();

if (strlen($mdp) > nbCaractereLogin($lePdo)) {
    echo "La taille de votre mot de passe est trop longue (15 caractères max), désolé...";
    $formatMdpOk = FALSE;
    echo "Votre saisie ne correspond pas au format de mot de passe valide.";
} else {
    $formatMdpOk = filter_var($mdp, FILTER_VALIDATE_EMAIL);
    echo "Votre saisie correspond au format de mot de passe valide.";
}
