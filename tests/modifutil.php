<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(modifutilisateur($lePdo,"nouveaumail@gmail.com",60000,"ayad"));