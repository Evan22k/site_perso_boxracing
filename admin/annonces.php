<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root', '');
if (!$_SESSION['mdp']) {
    header('Location: connexion.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Afficher toutes les annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styleAdmin.css">
</head>

<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-left">
                <a href="index.php">Accueil</a>
                <a href="publi_annonces.php">Publier une annonce</a>
            </div>
            <h1 class="navbar-title">Gérer les annonces</h1>
            <div class="navbar-right">
                <form action="deconnect.php" method="post">
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>
    <?php
    $recup_annonce = $bdd->query('SELECT * FROM annonce ORDER BY id DESC');
    ?>
    <div class="container">
        <div class="row">
            <?php while ($annonce = $recup_annonce->fetch()): ?>
                <div class="col-md-4 mb-4">
                    <div class="annonce card p-3 h-100">
                        <!-- Photos -->
                        <div class="photos d-flex flex-wrap gap-2">
                            <?php
                            $photos = $bdd->prepare('SELECT * FROM photos WHERE id_annonce = ? ORDER BY nom ASC');
                            $photos->execute([$annonce['id']]);
                            $allPhotos = $photos->fetchAll();
                            ?>
                            <?php if (count($allPhotos) > 0): ?>
                                <div class="slider" id="slider-<?= $annonce['id'] ?>">
                                    <div class="slides">
                                        <?php foreach ($allPhotos as $photo): ?>
                                            <img src="<?= $photo['fichier_url']; ?>" alt="photo" class="slide-img">
                                        <?php endforeach; ?>
                                    </div>
                                    <button class="prev" onclick="prevSlide(<?= $annonce['id'] ?>)">&#10094;</button>
                                    <button class="next" onclick="nextSlide(<?= $annonce['id'] ?>)">&#10095;</button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="annonce-infos mt-3">
                            <h4><?= $annonce['marque']; ?> - <?= $annonce['modele']; ?></h4>
                            <p><?= $annonce['version']; ?></p>
                            <div class="infos-grid">
                                <p>1ère Immat : <?= $annonce['premImmat']; ?></p>
                                <p>Cylindrée : <?= $annonce['cylindree']; ?>cc</p>
                                <p><?= $annonce['kilometrage']; ?> kms</p>
                                <p>A2 : <?= $annonce['a2']; ?></p>
                                <p>Garantie : <?= $annonce['garantie']; ?></p>
                            </div>
                        </div>
                        <p>Options : <?= $annonce['options']; ?></p>
                        <hr>
                        <p><?= $annonce['description']; ?></p>
                        <p><strong><?= $annonce['prix']; ?> €</strong></p>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="suppr_annonces.php?id=<?= $annonce['id']; ?>" class="btn btn-danger">Supprimer</a>
                            <a href="modif_annonces.php?id=<?= $annonce['id']; ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="../script.js"></script>
</body>

</html>