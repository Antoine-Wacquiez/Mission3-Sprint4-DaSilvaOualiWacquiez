<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(getrecherche($lePdo,"Lille","Appartement", "non", 0, 2000000, 70, 1));