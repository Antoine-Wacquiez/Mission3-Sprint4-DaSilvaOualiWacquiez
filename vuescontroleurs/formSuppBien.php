<?php
include_once '../inc/entete.inc';
?>

<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
if (isset($_POST['id'])) {
    $type = $_POST['id'];
}
?>
<br>

<h3>Pour supprimer :</h3>
<br>
<form method="post" action="formSuppBien.php">
    <fieldset>

        <label for="id">Saisir l'id du bien à supprimer:</label>
        <input type="nombre" name="id" id="idBien" />
    </fieldset>
    <br>
    <input class="submit" type="submit" value="Supprimer"  />

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