<?php

function connexionBDD() {
    $bdd = 'mysql:host=localhost;dbname=mission3';
    $user = 'root';
    $password = '';
    try {

        $ObjConnexion = new PDO($bdd, $user, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $ObjConnexion;
}

function deconnexionBDD($cnx) {
    $cnx = null;
}

function testLoginMdp($pdo, $login, $mdp) {
    $pdoStatement = $pdo->prepare("SELECT count(*) as nbLogin FROM utilisateur WHERE login = :login and mdp= :password");
    $bv1 = $pdoStatement->bindValue(':login', $login);
    $bv2 = $pdoStatement->bindValue(':password', $mdp);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    if ($resultatRequete['nbLogin'] == 1) {
        $loginTrouve = true;
    } else {
        $loginTrouve = false;
    }
    return $loginTrouve;
}

function nbCaractereLogin($pdo) {
    $pdoStatement = $pdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH AS NbCarLogin FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='utilisateur' AND COLUMN_NAME='login'");
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    return $resultatRequete['NbCarLogin'];
}

function nbCaractereMdp($pdo) {
    $pdoStatement = $pdo->prepare("SELECT CHARACTER_MAXIMUM_LENGTH AS NbCarMdp FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='utilisateur' AND COLUMN_NAME='mdp'");
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    return $resultatRequete['NbCarMdp'];
}

function hachagemdp($pdo, $mdp) {
    $recuperation = ('Select mdp from utilisateur ');
    $statement = $pdo->prepare($recuperation);
    $statement->execute();
    $resultat = $statement->fetch();
    $mdp = $resultat;
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $recuperation1 = ("update utilisateur set mdp = $mpd_hash where id = 1  ");
    $execute->execute();
    return $execute;
    if (password_verify($mdp, $mdp_hash)) {
        echo "Mot de passe correct";
    } else {
        echo "Mot de passe incorrect";
    }
}

function getlesbiens($pdo) {
    $pdoStatement = $pdo->prepare("SELECT id_bien , ville , type , prix, description, surface, nbpieces, jardin FROM bien inner join type on bien.type = type.nomType");
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetchAll();
    return $resultatRequete;
}

function getype($pdo) {
    $pdoStatement = $pdo->prepare("SELECT nomType  from type ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getville($pdo) {
    $pdoStatement = $pdo->prepare("SELECT distinct ville  from bien ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getjardin($pdo) {
    $pdoStatement = $pdo->prepare("SELECT distinct jardin  from bien ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getprix($pdo) {
    $pdoStatement = $pdo->prepare("SELECT prix   from bien ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getsurface($pdo) {
    $pdoStatement = $pdo->prepare("SELECT surface from bien ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getnbpiece($pdo) {
    $pdoStatement = $pdo->prepare("SELECT nbpieces from bien ");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function getrecherche($pdo, $ville, $type, $jardin, $min, $max, $surfacemin, $nbpieces) {
    $requete = "SELECT id_bien,ville ,Type ,prix, jardin, surface, nbpieces from bien Inner join Type on Type.nomType=bien.Type where 1=1";

    if ($ville != "") {
        $requete .= " and ville= :ville";
    }

    if ($type != "") {
        $requete .= " and type = :type";
    }

    if ($jardin != "") {
        $requete .= " and jardin = :jardin";
    }

    if ($min != "" && $max != "") {
        $requete .= " and prix between :min and :max";
    }

    if ($surfacemin != "") {
        $requete .= " and surface >= :surfacemin";
    }

    if ($nbpieces != "") {
        $requete .= " and nbpieces >= :nbpieces";
    }

    $pdoStatement = $pdo->prepare($requete);
    if ($ville != "") {
        $bv1 = $pdoStatement->bindValue(':ville', $ville);
    }

    if ($type != "") {
        $bv2 = $pdoStatement->bindValue(':type', $type);
    }

    if ($jardin != "") {
        $bv3 = $pdoStatement->bindValue(':jardin', $jardin);
    }

    if ($min != "" && $max != "") {
        $bv4 = $pdoStatement->bindValue(':min', $min);
        $bv5 = $pdoStatement->bindValue(':max', $max);
    }

    if ($surfacemin != "") {
        $bv6 = $pdoStatement->bindValue(':surfacemin', $surfacemin);
    }

    if ($nbpieces != "") {
        $bv7 = $pdoStatement->bindValue(':nbpieces', $nbpieces);
    }



    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();

    return $resultat;
}

function ajoutbien($pdo, $type, $prix, $description, $surface, $ville, $nbpieces, $jardin, $id_bien) {
    $pdoStatement = $pdo->prepare("INSERT INTO bien (type, prix, description, surface, ville, nbpieces, jardin, id_bien) VALUES (:type, :prix, :description, :surface, :ville, :nbpieces, :jardin,:id_bien)");
    $bv1 = $pdoStatement->bindValue(':type', $type);
    $bv2 = $pdoStatement->bindValue(':prix', $prix);
    $bv3 = $pdoStatement->bindValue(':description', $description);
    $bv4 = $pdoStatement->bindValue(':surface', $surface);
    $bv5 = $pdoStatement->bindValue(':ville', $ville);
    $bv6 = $pdoStatement->bindValue(':nbpieces', $nbpieces);
    $bv7 = $pdoStatement->bindValue(':jardin', $jardin);
    $bv8 = $pdoStatement->bindValue(':id_bien', $id_bien);
    $execution = $pdoStatement->execute();
    return $execution;
}

function getidbien($pdo) {
    $pdoStatement = $pdo->prepare("Select id_bien from bien");
    $execution = $pdoStatement->execute();
    $resultat = $pdoStatement->fetchAll();
    return $resultat;
}

function modifbien($pdo, $type, $surface, $prix, $ville, $description, $nbpieces, $jardin, $idbien) {
    $pdoStatement = $pdo->prepare("Update bien set type = :type , surface =:surface , prix= :prix , ville =:ville , description =:description ,nbpieces= :nbpieces , jardin=:jardin where id_bien = :id_bien");
    $bv1 = $pdoStatement->bindValue(':type', $type);
    $bv2 = $pdoStatement->bindValue(':surface', $surface);
    $bv3 = $pdoStatement->bindValue(':prix', $prix);
    $bv4 = $pdoStatement->bindValue(':ville', $ville);
    $bv5 = $pdoStatement->bindValue(':description', $description);
    $bv6 = $pdoStatement->bindValue(':nbpieces', $nbpieces);
    $bv7 = $pdoStatement->bindValue(':jardin', $jardin);
    $bv8 = $pdoStatement->bindValue(':id_bien', $idbien);
    $execution = $pdoStatement->execute();
    return $execution;
}

function getunbien($pdo, $ref) {
    $pdoStatement = $pdo->prepare("SELECT * FROM bien WHERE id_bien = :reference");
    $bv1 = $pdoStatement->bindValue(':reference', $ref);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    return $resultatRequete;
}

function getlesimages($pdo, $ref) {
    $pdoStatement = $pdo->prepare("SELECT chemin, chemin2, chemin3 FROM images WHERE id_bien = :reference");
    $bv1 = $pdoStatement->bindValue(':reference', $ref);
    $execution = $pdoStatement->execute();
    $resultatRequete = $pdoStatement->fetch();
    return $resultatRequete;
}

function suppBien($pdo, $idbien) {
    $pdoStatement = $pdo->prepare("DELETE FROM bien WHERE id_bien = :id_bien");
    $bv1 = $pdoStatement->bindValue(':id_bien', $idbien);
    $execution = $pdoStatement->execute();
    return $execution;
}
