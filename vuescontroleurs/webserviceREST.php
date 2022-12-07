<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
$methode=$_SERVER["REQUEST_METHOD"];
switch ($methode){
    case "GET":
        if (!isset($_GET['id'])){
        // Retourner tous les étudiants en json
            $lesBiens=getlesbiens($lePdo);
            echo json_encode($lesBiens);
        } else {
        // Retourner l’étudiant d’id $_GET[‘id’] en json
            echo json_encode($lesBiens($_GET['id'] ));
        }
    break;
    case "POST":
        // Créer l’étudiant d’id $_POST[‘id’] - de nom $_POST[‘nom’] - etc..
        // ajoutbien($pdo, $type, $prix, $description, $surface, $ville, $nbpieces, $jardin, $id_bien);
    break;
    case "PUT":
        parse_str(file_get_contents('php://input'), $_PUT) ;
        // Modifier l’étudiant d’id $_PUT[‘id’]
    break;
    case "DELETE":
        parse_str(file_get_contents('php://input'), $_DELETE);
        // Supprimer l’étudiant
    break;
}

?>