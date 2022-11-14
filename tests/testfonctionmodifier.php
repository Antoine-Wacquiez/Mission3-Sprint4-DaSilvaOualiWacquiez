<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
var_dump(modifbien($lePdo,"Appartement",23,2120000,"Paris","Test",3,"non",2));
