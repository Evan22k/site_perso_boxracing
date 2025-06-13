<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');

if (isset($_GET['id']) && isset($_GET['id_annonce'])) {
    $photo_id = $_GET['id'];
    $annonce_id = $_GET['id_annonce'];

    $getPhoto = $bdd->prepare("SELECT fichier_url FROM photos WHERE id = ?");
    $getPhoto->execute([$photo_id]);
    $photo = $getPhoto->fetch();

    if ($photo && file_exists($photo['fichier_url'])) {
        unlink($photo['fichier_url']);
    }

    $deletePhoto = $bdd->prepare("DELETE FROM photos WHERE id = ?");
    $deletePhoto->execute([$photo_id]);

    header("Location: modif_annonces.php?id=" . $annonce_id);
    exit();
}
?>