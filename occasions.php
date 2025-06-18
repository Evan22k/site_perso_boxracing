<?php include "header.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;

    if ($marque) {
        $stmt = $bdd->prepare("SELECT * FROM annonce WHERE marque = ? ORDER BY id DESC");
        $stmt->execute([$marque]);
    } else {
        $stmt = $bdd->query("SELECT * FROM annonce ORDER BY id DESC");
    }

    $marquesStmt = $bdd->query("SELECT DISTINCT marque FROM annonce ORDER BY marque ASC");
    $marques = $marquesStmt->fetchAll(PDO::FETCH_COLUMN);
} catch (Exception $e) {
    die("Erreur BDD : " . $e->getMessage());
}
?>

<div class="container-fluid container-black">
    <h1>Nos occasions en vente :</h1>
    <hr>

    <!-- Filtre par marque -->
    <div class="all-filter mb-3">
        <a href="occasions.php" class="btn btn-all <?= !$marque ? 'active' : '' ?>">Toutes</a>
        <?php foreach ($marques as $m): ?>
            <a href="occasions.php?marque=<?= urlencode($m) ?>" class="btn btn-filtre <?= ($marque === $m) ? 'active' : '' ?>">
                <?= htmlspecialchars($m) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="container container-white">
    <div class="custom-row">
        <?php while ($annonce = $stmt->fetch()): ?>
            <?php
            $photos = $bdd->prepare("SELECT fichier_url FROM photos WHERE id_annonce = ? ORDER BY nom ASC LIMIT 1");
            $photos->execute([$annonce['id']]);
            $photo = $photos->fetch();
            ?>
            <div class="col">
                <a href="annonce.php?id=<?= $annonce['id'] ?>" class="card card-annonce">
                    <?php if ($photo): ?>
                        <img src="/admin/<?= htmlspecialchars($photo['fichier_url']) ?>" class="card-img-top" alt="photo">
                    <?php else: ?>
                        <img src="default.jpg" class="card-img-top" alt="no-photo">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($annonce['marque']) ?> - <?= htmlspecialchars($annonce['modele']) ?></h5>
                        <p class="card-text"><strong><?= number_format($annonce['prix'], 0, ',', ' ') ?> €</strong></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include "footer.php"; ?>
