<?php
session_start();

// // Liste des IP autorisées
// $ips_autorisees = ['::1']; // Remplace par tes vraies IP

// // IP de l'utilisateur actuel
// $ip_utilisateur = $_SERVER['REMOTE_ADDR'];

// if (!in_array($ip_utilisateur, $ips_autorisees)) {
//     http_response_code(403); // Code HTTP interdit
//     die("Accès refusé. Votre IP ($ip_utilisateur) n'est pas autorisée.");
// }

if (isset($_POST['valider'])) {
    if (!empty($_POST['id']) and !empty($_POST['mdp'])) {
        $id_par_defaut = "admin";
        $mdp_par_defaut = "adm1234";

        $id_saisi = htmlspecialchars($_POST['id']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if ($id_saisi == $id_par_defaut and $mdp_saisi == $mdp_par_defaut) {
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location:index.php');
        } else {
            echo "Votre mot de passe ou votre identifiant est incorrect";
        }
    } else {
        echo "Veuillez compléter tous les champs...";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace de connexion admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="styleAdmin.css">
</head>

<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-left">
            </div>
            <h1 class="navbar-title">Connexion Admin</h1>
            <div class="navbar-right">
                <a href="../accueil.php">Retour à l'accueil</a>
            </div>
        </nav>
    </header>
    <form method="POST" action="" class="inputs-connexion">
        <input type="text" name="id" placeholder="Identifiant" autocomplete="off">
        <br>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>

</html>