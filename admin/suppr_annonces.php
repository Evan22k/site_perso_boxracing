<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', '');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Récupérer les fichiers des photos associées
    $recupPhotos = $bdd->prepare('SELECT fichier_url FROM photos WHERE id_annonce = ?');
    $recupPhotos->execute([$id]);
    $photos = $recupPhotos->fetchAll();

    // 2. Supprimer physiquement les fichiers
    foreach ($photos as $photo) {
        $filePath = $photo['fichier_url'];
        if (file_exists($filePath)) {
            unlink($filePath); // Supprime le fichier dans /uploads/
        }
    }

    // 3. Supprimer les entrées dans la table photos
    $supprPhotos = $bdd->prepare('DELETE FROM photos WHERE id_annonce = ?');
    $supprPhotos->execute([$id]);

    // 4. Supprimer l'annonce
    $supprAnnonce = $bdd->prepare('DELETE FROM annonce WHERE id = ?');
    $supprAnnonce->execute([$id]);

    // 5. Redirection
    header('Location: index.php?delete=1');
    exit();
} else {?>
        <div class="alert alert-danger" style="text-align:center; margin: 20px auto; max-width: 600px;">
            Un problème est survenu lors de la publication de l'annonce
        </div>
<?php
}
?> 