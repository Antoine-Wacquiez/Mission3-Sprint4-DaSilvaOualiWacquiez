<?php
include_once '../inc/entete.inc';
?>
<h2>LISTE DES BIENS </h2>

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

        $larecherche = getrecherche($lePdo, $ville, $type, $jardin, $min, $max, $surfacemin, $nbpiecesmin);
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