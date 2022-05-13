<?php
include_once '../inc/entete.inc';
?>



<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $ville = $_POST['ville'];
    $description = $_POST['description'];
    $nbpieces = $_POST['nbpieces'];
    $jardin = $_POST['jardin'];
    $idbien = $_POST['idbien'];

    modifbien($lePdo, $type, $surface, $prix, $ville, $description, $nbpieces, $jardin, $idbien);
}
?>
<br>
<h3>Pour modifier :</h3>
<br>
<form method="post" action="">

    <fieldset>

        <label for="idbien">Saissiez l'id du bien que vous voulez modifier ?</label><br />
        <select name="idbien" id="idbien">

            <?php
            include_once '../modeles/mesFonctionsAccesBDD.php';
            $lePdo = connexionBDD();
            $lesid = getidbien($lePdo);
            foreach ($lesid as $unid) {
                echo '<option value="' . $unid['id_bien'] . '">' . $unid['id_bien'] . '</option>';
            }
            ?>
        </select>
    </fieldset>
    <br>

    <fieldset>

        <label for="type">Quel type de bien voulez-vous ?</label><br />
        <select name="type" id="type">
            <option value="maison" >Maison </option>
            <option value="appartement">Appartement</option>
            <option value="local">Local Commercial</option>
            <option value="immeuble">Immeuble</option>
            <option value="terrainNu">Terrain Nu</option>

        </select>

    </fieldset>

    <br>

    <fieldset>

        <label for="surface">Quel est la surface en m² ?</label>
        <input type="nombre" name="surface" id="surface" />
        <br><br>
        <label for="prix">Quel est le prix ?</label>
        <input type="nombre" name="prix" id="prix" />
        <br><br>
        <label for="ville">Quel est la ville ?</label>
        <input type="text" name="ville" id="ville" />
        <br><br>

        <label for="description">Quel est la description ?</label>
        <input type="text" name="description" id="description" />
        <br><br>

        <label for="nbpieces">Quel est le nombre de pièces ?</label>
        <input type="text" name="nbpieces" id="nbpieces" />

    </fieldset>

    <br>

    <fieldset>

        <label for="typeBien">Y'a-t-il un jardin ?</label><br />
        <select name="jardin" id="jardin">
            <option value="Oui">Oui </option>
            <option value="Non">Non</option>

        </select>

    </fieldset>

    <br>

    <input class="submit" type="submit" value="Modifier"  />
    <br>

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
    $lePdo = connexionBDD();
    $lesbiens = getlesbiens($lePdo);

    foreach ($lesbiens as $unbien) {
        $info = '<tr> <td class=\'reference\'>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['id_bien'] . '</a> </td> '
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['ville'] . '</a> </td> '
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['type'] . '</a> </td>'
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['prix'] . '</a> </td>'
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['surface'] . '</a> </td>'
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['nbpieces'] . '</a> </td>'
                . '<td>' . '<a href=' . '../autres/unBien.php?id_bien=' . $unbien['id_bien'] . '>' . $unbien['jardin'] . '</a> </td>';
        echo $info;
    }
    ?>

</table>

<?php
include_once '../inc/piedDePage.inc';
?>
