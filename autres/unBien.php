<?php
include_once '../inc/entete.inc';
?>

<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$pdo = connexionBDD();
$ref = $_GET['id_bien'];
$unbien = getunbien($pdo, $ref);
$uneimage = getlesimages($pdo, $ref);
?>
<script src=="../js/html2canvas.min.js"></script>
<script src=="../js/jspdf.min.js"></script>
<script>
    function genererPDF() {
        html2canvas(document.getElementById("description"), {
            onrendered: function (canvas)
            {
                var img = canvas.toDataURL("image/jpeg");
                if (window.screen.availWidth < window.screen.availHeight) {
                    var doc = new jsPDF({
                        orientation: 'portrait'
                    });
                }
                if (window.screen.availWidth > window.screen.availHeight) {
                    var doc = new jsPDF({
                        orientation: 'landscape'
                    });
                }
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('description_bien.pdf');
            }
        });
    }
</script>
<br>
<div class="description">
    <h2><?php echo ' ' . $unbien['type'] . ' ' . $unbien['ville']; ?></h2>

    <br><br>

    <!-- Conteneur principal de tout le diaporama -->
    <div class="diapo">
        <!-- Conteneur des "diapos" -->
        <div class="elements">
            <!-- Première diapo -->
            <div class="element active">
                <img class="cadre" src="<?php echo $uneimage['chemin']; ?>" alt="Image de l'immobilier">
            </div>
            <!-- Deuxième diapo -->
            <div class="element">
                <img class="cadre" src="<?php echo $uneimage['chemin2']; ?>" alt="Image salle de bain">
            </div>
            <!-- Deuxième diapo -->
            <div class="element">
                <img class="cadre" src="<?php echo $uneimage['chemin3']; ?>" alt="Image chambre">
            </div>
        </div>
        <!-- Flèches de navigation -->
        <i id="nav-gauche" class="las la-chevron-left"></i>
        <i id="nav-droite" class="las la-chevron-right"></i>
    </div>
    <!-- Fichiers JS -->
    <script src="javascript.js"></script>

    <br>

    <h4>Description :</h4>  

    <p><?php echo ' ' . $unbien['description']; ?></p>

    <br>

    <h4>Détails :</h4>

    <p>Existence d'un jardin ? : <?php echo ' ' . $unbien['jardin']; ?>.</p>


    <br>

    <ul>
        <li> <i class="fas fa-building"></i> Le type : <?php echo ' ' . $unbien['type']; ?> </li>
        <li> <i class="fab fa-bandcamp"></i> <?php echo ' ' . $unbien['surface']; ?> m² </li>
        <li> <i class="fas fa-bed"></i> <?php echo ' ' . $unbien['nbpieces']; ?> pièce(s)</li>
        <li> <i class="fas fa-euro-sign"></i> <?php echo ' ' . $unbien['prix']; ?> euros</li>
    </ul>
</div>
<br><br><br>
<button onclick="genererPDF();">Generer</button>
<?php
include_once '../inc/piedDePage.inc';
?>
