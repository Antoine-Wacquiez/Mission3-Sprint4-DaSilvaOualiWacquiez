<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(ajoutbien($lePdo,"local",3353,464363,"ezfefe","Test",3,"non",NULL));
