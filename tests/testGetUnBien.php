<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(getunbien($lePdo, 4));

