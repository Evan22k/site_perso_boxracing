<?php 
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styleAdmin.css">
</head>

<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-left">
            </div>
            <h1 class="navbar-title">Espace Admin</h1>
            <div class="navbar-right">
                <form action="deconnect.php" method="post">
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>
    <h2>Actions :</h2>
    <hr>
    <div class="container my-4 mt-5">
        <div class="row justify-content-center gap-4">

            <!-- Card 1 -->
            <div class="card card-action" style="width: 18rem;">
            <a href="publi_annonces.php" class="stretched-link text-decoration-none text-dark">
                <img src="../images/new.jpg" class="card-img-top" alt="Publier une annonce">
                <div class="card-body">
                <h5 class="card-title text-center">Publier une annonce</h5>
                </div>
            </a>
            </div>

            <!-- Card 2 -->
            <div class="card card-action" style="width: 18rem;">
            <a href="annonces.php" class="stretched-link text-decoration-none text-dark">
                <img src="../images/postit.jpg" class="card-img-top" alt="Voir les annonces">
                <div class="card-body">
                <h5 class="card-title text-center">Afficher toutes les annonces</h5>
                </div>
            </a>
            </div>

        </div>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success" style="text-align:center; margin: 20px auto; max-width: 600px;">
            L'annonce a bien été postée !
        </div>
    <?php endif;
         if (isset($_GET['delete']) && $_GET['delete'] == 1): ?>
        <div class="alert alert-success" style="text-align:center; margin: 20px auto; max-width: 600px;">
            L'annonce a bien été supprimée !
        </div>
    <?php endif; ?>
</body>

</html>