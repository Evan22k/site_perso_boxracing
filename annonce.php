<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID d\'annonce invalide');
}

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
$annonceId = (int) $_GET['id'];

$stmt = $bdd->prepare("SELECT * FROM annonce WHERE id = ?");
$stmt->execute([$annonceId]);
$annonce = $stmt->fetch();

if (!$annonce) {
    die("Annonce introuvable");
}

// Récupération de toutes les photos associées, ordonnées par nom croissant (ajuste selon ta colonne)
$photos = $bdd->prepare("SELECT fichier_url FROM photos WHERE id_annonce = ? ORDER BY fichier_url ASC");
$photos->execute([$annonceId]);
$allPhotos = $photos->fetchAll();
?>

<?php include 'header.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<div class="container-black">

    <?php if (count($allPhotos) >= 1): ?>
        <div id="carouselPhotos" class="carousel slide annonce-carousel">
            <div class="carousel-inner">
                <?php foreach ($allPhotos as $index => $photo): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <a href="/admin/<?= htmlspecialchars($photo['fichier_url']) ?>" target="_blank">
                            <img src="/admin/<?= htmlspecialchars($photo['fichier_url']) ?>" class="d-block w-100" alt="photo" style="max-height: 400px; object-fit: contain;">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($allPhotos) > 1): ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<div class="container-white ">
    <h1><?= htmlspecialchars($annonce['marque']) ?> - <?= htmlspecialchars($annonce['modele']) ?></h1>
    <p class="version"><?= $annonce['version'] ?></p>
    <p class="prix"><?= number_format($annonce['prix'], 0, ',', ' ') ?> €</p>
    <hr>

    <!-- Infos principales (exemple) -->
    <div class="row mb-4 infos-annonce">
        <div class="col-md-4">
            <strong>Kilométrage :</strong> <?= $annonce['kilometrage'] ?> kms
        </div>
        <div class="col-md-4">
            <strong>Cylindrée :</strong> <?= $annonce['cylindree'] ?> cc
        </div>
    </div>

    <div class="row mb-4 infos-annonce">
        <div class="col-md-4">
            <strong>1ère immatriculation :</strong> <?= $annonce['premImmat'] ?>
        </div>
        <div class="col-md-4">
            <strong>A2 :</strong> <?= $annonce['a2'] ?>
        </div>
        <!-- Ajoute d'autres infos si besoin -->
    </div>

    <!-- Description -->
    <div class="description">
        <h4>Description</h4>
        <p><?= $annonce['description'] ?></p>
    </div>
    <a href="occasions.php" class="btn-retour">← Retour aux annonces</a>

    <h5 class="h5-phrase">Pour plus d’informations n’hésitez pas à nous contacter directement par téléphone ou email dans la rubrique contact. </h5>
</div>

<?php include 'footer.php' ?>