<?php
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root', '');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getID = $_GET['id'];

    $recupAnnonce = $bdd->prepare('SELECT * FROM annonce WHERE id = ?');
    $recupAnnonce->execute(array($getID));
    if ($recupAnnonce->rowCount() > 0) {
        $annonceInfos = $recupAnnonce->fetch();
        $marque = $annonceInfos['marque'];
        $modele = $annonceInfos['modele'];
        $version = $annonceInfos['version'];
        $premImmat = $annonceInfos['premImmat'];
        $cylindree = $annonceInfos['cylindree'];
        $kilometrage = $annonceInfos['kilometrage'];
        $a2 = $annonceInfos['a2'];
        $garantie = $annonceInfos['garantie'];
        $options = str_replace('<br />', '', $annonceInfos['options']);
        $description = str_replace('<br />', '', $annonceInfos['description']);
        $prix = $annonceInfos['prix'];


        if (isset($_POST['valider'])) {
            $marque_saisi = htmlspecialchars($_POST['marque']);
            $modele_saisi = htmlspecialchars($_POST['modele']);
            $version_saisi = htmlspecialchars($_POST['version']);
            $premImmat_saisi = htmlspecialchars($_POST['premImmat']);
            $cylindree_saisi = htmlspecialchars($_POST['cylindree']);
            $kilometrage_saisi = htmlspecialchars($_POST['kilometrage']);
            $a2_saisi = htmlspecialchars($_POST['a2']);
            $garantie_saisi = htmlspecialchars($_POST['garantie']);
            $options_saisi = nl2br(htmlspecialchars($_POST['options']));
            $description_saisi = nl2br(htmlspecialchars($_POST['description']));
            $prix_saisi = htmlspecialchars($_POST['prix']);


            $updateAnnonce = $bdd->prepare('UPDATE annonce SET marque = ?, modele = ?, version = ?, premImmat = ?, cylindree = ?, kilometrage = ?, a2 = ?, garantie = ?, options = ?, description = ?, prix = ? WHERE id = ?');
            $updateAnnonce->execute(array($marque_saisi, $modele_saisi, $premImmat_saisi, $cylindree_saisi, $kilometrage_saisi, $a2_saisi, $garantie_saisi, $options_saisi, $description_saisi, $prix_saisi, $getID));
            if (!empty($_FILES['photos']['name'][0])) {
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES['photos']['name'][$key];
                    $file_tmp = $_FILES['photos']['tmp_name'][$key];
                    $file_ext = strtolower(strrchr($file_name, '.'));
                    $file_dest = 'uploads/' . uniqid() . $file_ext;

                    $allowed_exts = ['.jpg', '.jpeg', '.png'];

                    if (in_array($file_ext, $allowed_exts)) {
                        if (move_uploaded_file($file_tmp, $file_dest)) {
                            $insertPhoto = $bdd->prepare("INSERT INTO photos (id_annonce, nom, fichier_url) VALUES (?, ?, ?)");
                            $insertPhoto->execute([$getID, $file_name, $file_dest]);
                        }
                    }
                }
            }
            header('Location: annonces.php');
        }
    } else {
        echo "Aucune annonce trouvée";
    }
} else {
    echo "Aucun identifiant trouvé";
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
                <a href="annonces.php">Annonces</a>
            </div>
            <h1 class="navbar-title">Modifier l'annonce</h1>
            <div class="navbar-right">
                <form action="deconnect.php" method="post">
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>
    <form method="POST" action="" enctype="multipart/form-data" class="form-annonce grid-form">
        <div class="inputs-left">
            <input type="text" name="marque" placeholder="Marque" value="<?= $marque; ?>" required>
            <input type="text" name="modele" placeholder="Modèle" value="<?= $modele; ?>" required>
            <input type="text" name="version" placeholder="Version" value="<?= $version; ?>">
            <input type="text" name="premImmat" placeholder="1ère immatriculation" value="<?= $premImmat; ?>" required>
            <input type="text" name="cylindree" placeholder="Cylindrée" value="<?= $cylindree; ?>" required>
            <input type="number" name="kilometrage" placeholder="Kilométrage" min="1" value="<?= $kilometrage; ?>" required>
            <input type="text" name="a2" placeholder="A2" value="<?= $a2; ?>" required>
            <input type="text" name="garantie" placeholder="Garantie" value="<?= $garantie; ?>" required>
            <input type="number" name="prix" placeholder="Prix" min="1" value="<?= $prix; ?>" required>
        </div>
        <div class="textareas-right">
            <textarea name="options" placeholder="Options">
                <?= $options; ?>
            </textarea>
            <textarea name="description" placeholder="Description" required>
                <?= $description; ?>
            </textarea>
        </div>
        <div class="files-left">
            <?php
            $photos = $bdd->prepare("SELECT * FROM photos WHERE id_annonce = ?");
            $photos->execute([$getID]);
            foreach ($photos as $photo) {
                echo '
                    <div style="position: relative;">
                        <img src="' . $photo['fichier_url'] . '" alt="photo" style="max-width: 150px; height: auto;">
                        <a href="suppr_photos.php?id=' . $photo['id'] . '&id_annonce=' . $getID . '" 
                        style="position:absolute; top:5px; right:5px; background:red; color:white; padding:2px 5px; text-decoration:none; font-weight:bold;">
                        ×
                        </a>
                    </div>';
            }
            ?>
        

            <h5>Sélectionner de nouvelles photos :</h5>
            <input type="file" name="photos[]" multiple accept="image/*">
        </div>
        <div class="submit-right">
            <input type="submit" name="valider" value="Valider">
        </div>
    </form>
</body>

</html>