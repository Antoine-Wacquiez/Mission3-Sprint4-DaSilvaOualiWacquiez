<?php
    session_start();
    include_once '../modeles/mesFonctionsAccesBDD.php';

    $lePdo = connexionBDD();

    $lesinfos = recupinfo($lePdo,$_SESSION['username']);

    $json = json_encode($lesinfos);
    echo "$json";

    $file ="info.json";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        exit;
?>
