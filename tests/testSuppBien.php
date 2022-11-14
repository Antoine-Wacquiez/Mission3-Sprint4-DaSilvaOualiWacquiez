<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(suppBien($lePdo, 1));
