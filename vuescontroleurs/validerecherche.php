<?php
include_once '../inc/entete.inc';
?>
<h2>LISTE DES BIENS </h2>
<br><br>
<form class="filtre" name="filtre" id="filtre" method="post" action="validerecherche.php">
    
    <h3> Filtre de recherche </h3>
    <br>
    <label for="ville" title="Veuillez choisir votre ville" class="oblig">Veuillez choisir votre Ville  :</label>
    <select id="ville" name ="ville" title="Veuillez choisir votre ville">
        <?php
        $lePdo = connexionBDD();
        $lesvilles = getville($lePdo);
        echo '<option value="">&nbsp;</option>';
        foreach ($lesvilles as $uneville) {
            echo '<option value="' . $uneville['ville'] . '">' . $uneville['ville'] . '</option>';
        }
        ?>
    </select>

    <br>
    <br>

    <label for="type" title="Veuillez choisir votre type" class="oblig">Veuillez choisir votre Type  :</label>
    <select id="type" name ="type" title="Veuillez choisir votre type">
        <?php
        $lePdo = connexionBDD();
        $lestypes = getype($lePdo);
        echo '<option value="">&nbsp;</option>';
        foreach ($lestypes as $untype) {
            echo '<option value="' . $untype['nomType'] . '">' . $untype['nomType'] . '</option>';
        }
        ?>
    </select> 

    <br>
    <br>

    <label for="jardin" title="Veuillez choisir si vous voulez un jardin " class="oblig">Veuillez choisir si vous voulez un jardin  :</label>
    <select id="jardin" name ="jardin" title="Veuillez choisir si vous voulez un jardin ">
        <?php
        $lePdo = connexionBDD();
        $jardin = getjardin($lePdo);
        echo '<option value="">&nbsp;</option>';
        foreach ($jardin as $untype) {
            echo '<option value="' . $untype['jardin'] . '">' . $untype['jardin'] . '</option>';
        }
        ?>
    </select> 

    <br>
    <br>

    <label for="prix" title="Veuillez choisir votre tranche de prix  " class="oblig">Veuillez choisir votre tranche de prix  :</label>
    <br>
    <label for="prix" title="Veuillez saisir votre prix minimum">Prix min :</label>
    <input type="text" value="" name="min" id="min" title="Veuillez saisir votre prix min " />
    
    <label for="prix" title="Veuillez saisir votre prix maximum ">Prix max  :</label>
    <input type="text" value="" name="max" id="max" title="Veuillez saisir votre prix max" />

    <br>
    <br>

    <label for="surface" title="Veuillez choisir votre surface minimum  " class="oblig">Veuillez choisir votre surface minimum  : </label>
    <input type="text" value="" name="surfacemin" >

    <br>
    <br>

    <label for="nbpieces" title="Veuillez choisir votre nbpieces minimum  " class="oblig">Veuillez choisir votre nombre de pièces minimum  : </label>
    <input type="text" value="" name="nbpiecesmin" >


    <br>
    <br>

    <input type="submit" name="valid" id="valid" value="Rechercher" />
</form>

<br>
<br>

<table class="tableau" border = "4">
    <tr>
        <th>La référence</th>
        <th>La ville</th>
        <th>Le type</th>
        <th>Le prix en euros</th>
        <th>La surface en m²</th>
        <th>Le nombre de pièces</th>
        <th>L'éxistence d'un jardin</th>

    </tr>
    <?php
    include_once '../modeles/mesFonctionsAccesBDD.php';
       if (isset($_POST['ville'])) {
        $lePdo = connexionBDD();
        $ville = $_POST['ville'];
        $type = $_POST['type'];
        $jardin = $_POST['jardin'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $surfacemin = $_POST['surfacemin'];
        $nbpiecesmin = $_POST['nbpiecesmin'];
        $id_bien= $_POST['id_bien'];

        $larecherche = getrecherche($lePdo, $ville, $type, $jardin, $min, $max, $surfacemin, $nbpiecesmin,$id_bien);
        foreach ($larecherche as $unbien) {

            $info = '<tr> <td class=\'reference\'>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['id_bien'] . '</a> </td> '
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['ville'] . '</a> </td> '
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['Type'] . '</a> </td>'
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['prix'] . '</a> </td>'
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['surface'] . '</a> </td>'
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['nbpieces'] . '</a> </td>'
                    . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['jardin'] . '</a> </td>';
            echo $info;
            ?>
            <?php
        }
    }
    ?>   

</table>
<?php
include_once '../inc/piedDePage.inc';
?>
