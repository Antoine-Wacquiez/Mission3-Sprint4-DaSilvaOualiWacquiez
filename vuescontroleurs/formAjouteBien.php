<?php
include_once '../inc/entete.inc';
?>



<body>    
    <?php
    include_once '../modeles/mesFonctionsAccesBDD.php';
    $lePdo = connexionBDD();
    $lestypes = getype($lePdo);

    if (isset($_POST['typebien'])) {
        $type = $_POST['typebien'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $surface = $_POST['surface'];
        $ville = $_POST['ville'];
        $nbpieces = $_POST['piece'];
        $jardin = $_POST['jardin'];
        $id_bien = NULL;
        ajoutbien($lePdo, $type, $prix, $description, $surface, $ville, $nbpieces, $jardin, $id_bien);
    }
    ?>

    <br>
    <h3>Pour ajouter :</h3>

    <br>
    <form method="post" action="">

        <fieldset>

            <label for="typeBien">Quel type de bien voulez-vous ?</label>
            <select name="typebien" id="typebien">
                <?php
                foreach ($lestypes as $untype) {
                    echo '<option value="' . $untype['nomType'] . '">' . $untype['nomType'] . '</option>';
                }
                ?>
            </select>
            <br><br>
            <label for="ville">Quel est la ville ?</label>
            <input type="text" name="ville" id="ville" />
            <br><br>
            <label for="surface">Quel est la surface en m² ?</label>
            <input type="nombre" name="surface" id="surface" />
            <br><br>
            <label for="prix">Quel est le prix ?</label>
            <input type="nombre" name="prix" id="prix" />
            <br><br>
            <label for="piece">Quel est le nombre de pièces ?</label>
            <input type="text" name="piece" id="piece" />
            <br><br>
            <label for="typeBien">Y'a-t-il un jardin ?</label>
            <select name="jardin" id="jardin">
                <option value="Oui">Oui </option>
                <option value="Non">Non</option>
            </select>
            <br><br>
            <label for="description">Votre description  ?</label>
            <input type="text" name="description" id="description" />

        </fieldset>

        <br>

        <input class="submit" type="submit" value="Ajouter" />
        <br>
    </form>

    <br><br><br><br><br><br><br>
    <?php
    include_once '../inc/piedDePage.inc';
    ?>