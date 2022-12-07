<?php

include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
var_dump($lePdo);
echo '<br>';
echo 'Affichage normal : ';
echo 'Bonjour';
echo '<br>';
echo 'Affichage Json : ';
echo json_encode('Bonjour');
echo '<br>';
echo 'Affichage normal : ';
var_dump(recupinfo($lePdo,"ayad"));
echo '<br>';
echo 'Affichage Json : ';
echo json_encode(recupinfo($lePdo,"ayad"));

?>