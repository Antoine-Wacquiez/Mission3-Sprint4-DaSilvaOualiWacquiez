<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
$ok= testLoginMdp($lePdo,"agent","agent");
var_dump($ok);
