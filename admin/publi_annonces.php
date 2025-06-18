<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', '');
if (!isset($_SESSION['mdp'])) {
    header('Location: connexion.php');
    exit();
}

if (isset($_POST['envoi'])) {
    // Récupération et nettoyage des données
    $marque = htmlspecialchars($_POST['marque']);
    $modele = htmlspecialchars($_POST['modele']);
    $version = htmlspecialchars($_POST['version']);
    $premImmat = htmlspecialchars($_POST['premImmat']);
    $cylindree = htmlspecialchars($_POST['cylindree']);
    $kilometrage = htmlspecialchars($_POST['kilometrage']);
    $a2 = htmlspecialchars($_POST['a2']);
    $garantie = htmlspecialchars($_POST['garantie']);
    $options = htmlspecialchars($_POST['options']);
    $description = nl2br(htmlspecialchars($_POST['description']));
    $prix = htmlspecialchars($_POST['prix']);


    // Vérifications
    if (
        !empty($marque) &&
        !empty($modele) &&
        !empty($premImmat) &&
        !empty($cylindree) &&
        is_numeric($cylindree) &&
        !empty($kilometrage) &&
        is_numeric($kilometrage) &&
        $kilometrage > 0 &&
        !empty($a2) &&
        !empty($garantie) &&
        !empty($description) &&
        !empty($prix) &&
        is_numeric($prix)
    ) {
        // Insertion de l'annonce
        $insert = $bdd->prepare('INSERT INTO annonce (marque, modele, version, premImmat, cylindree, kilometrage, a2, garantie, options, description, prix) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insert->execute([$marque, $modele, $version, $premImmat, $cylindree, $kilometrage, $a2, $garantie, $options, $description, $prix]);

        $id_annonce = $bdd->lastInsertId(); // Récupère l'id de l'annonce créée

        // Gestion des fichiers multiples
        if (!empty($_FILES['fichier'])) {
            $allowed_extensions = ['.jpg', '.jpeg', '.png', '.JPG', '.JPEG', '.PNG'];

            // Réorganise les fichiers dans un tableau unique et les trie par nom
            $files = [];
            foreach ($_FILES['fichier']['name'] as $key => $name) {
                $files[] = [
                    'name' => $name,
                    'tmp_name' => $_FILES['fichier']['tmp_name'][$key],
                    'type' => $_FILES['fichier']['type'][$key],
                    'error' => $_FILES['fichier']['error'][$key],
                    'size' => $_FILES['fichier']['size'][$key]
                ];
            }

            // Tri naturel (ex: _1, _2, _10)
            usort($files, fn($a, $b) => strnatcasecmp($a['name'], $b['name']));

            foreach ($files as $file) {
                $file_name = $file['name'];
                $tmp_name = $file['tmp_name'];
                $file_ext = strtolower(strrchr($file_name, '.'));

                if (in_array($file_ext, $allowed_extensions)) {
                    $new_name = uniqid() . $file_ext;
                    $file_dest = 'uploads/' . $new_name;

                    if (move_uploaded_file($tmp_name, $file_dest)) {
                        $insertPhoto = $bdd->prepare('INSERT INTO photos (nom, fichier_url, id_annonce) VALUES (?, ?, ?)');
                        $insertPhoto->execute([$file_name, $file_dest, $id_annonce]);
                    }
                }
            }
        }

        header('Location: index.php?success=1');
        exit();
    } else { ?>
        <div class="alert alert-danger" style="text-align:center; margin: 20px auto; max-width: 600px;">
            Un problème est survenu lors de la publication de l'annonce
        </div>
<?php
    }
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Publier une annonce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h1 class="navbar-title">Publier une annonce</h1>
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
            <input type="text" name="marque" placeholder="Marque" required>
            <input type="text" name="modele" placeholder="Modèle" required>
            <input type="text" name="version" placeholder="Version">
            <input type="text" name="premImmat" placeholder="1ère immatriculation" required>
            <input type="number" name="cylindree" placeholder="Cylindrée" required>
            <input type="number" name="kilometrage" placeholder="Kilométrage" min="1" required>
            <input type="text" name="a2" placeholder="A2" required>
            <input type="text" name="garantie" placeholder="Garantie" required>
            <input type="number" name="prix" placeholder="Prix" min="1" required>
        </div>

        <div class="textareas-right">
            <textarea name="options" placeholder="Options"></textarea>
            <textarea name="description" placeholder="Description" required></textarea>
        </div>

        <div class="files-left">
            <input type="file" name="fichier[]" multiple required>
        </div>

        <div class="submit-right">
            <input type="submit" name="envoi" value="Envoyer">
        </div>
    </form>

</body>

<!--test-->

</html>