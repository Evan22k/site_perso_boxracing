<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Box-Racing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-xl">
      <div class="container-fluid ">
        <a class="navbar-brand d-none d-xl-flex flex-column align-items-center" href="accueil.php" style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
          <img src="./images/boxracing_logo.png" alt="Logo" width="120" height="45" class="d-inline-block align-text-top">
          <span style="color: azure; font-size: 0.9rem; font-weight: bold;">Accueil</span>
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border:none; background:none;">
          <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
            <img src="./images/boxracing_logo.png" alt="Logo" width="120" height="45" />
            <span class="logo-text">Menu</span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item d-xl-none">
              <a class="nav-link pourpre" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="occasions.php">Occasions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="reprise_vente.php">Reprise / Vente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="atelier.php">Atelier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="prestations.php">Prestations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="actualites.php">Actualités</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pourpre" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>