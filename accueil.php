<?php include "header.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <div id="accueil_image" class="background-image-menu"></div>
  <div class="container-fluid container-black">
    <h1>Nos dernières annonces :</h1>
    <hr>

    <a href="occasions.php" class="a-link pourpre">Voir toutes les occasions</a>
    <div class="cards-container cards-3">

      <a href="https://box-racing.fr/announcement/199" class="card-link">
        <div class="card">
          <img src="images/moto1.jpg" class="card-img-top" alt="Moto">
          <div class="card-body">
            <h5 class="card-title">Marque - modèle moto</h5>
            <p class="card-text">Description moto occasion 1</p>
          </div>
        </div>
      </a>

      <a href="#" class="card-link">
        <div class="card">
          <img src="images/moto2.jpg" class="card-img-top" alt="Moto 2">
          <div class="card-body">
            <h5 class="card-title">Marque - modèle moto</h5>
            <p class="card-text">Description moto occasion 2</p>
          </div>
        </div>
      </a>

      <a href="#" class="card-link">
        <div class="card">
          <img src="images/moto3.jpg" class="card-img-top" alt="Moto 3">
          <div class="card-body">
            <h5 class="card-title">Marque - modèle moto</h5>
            <p class="card-text">Description moto occasion 3</p>
          </div>
        </div>
      </a>

    </div>
  </div>

  <div class="container-fluid container-white">
    <h1>Interventions uniquement sur :</h1>
    <hr>
    <div class="logos-marques">
      <img src="images/honda-logo.png" alt="Honda">
      <img src="images/kawasaki-5-logo-png-transparent.png" alt="Kawasaki">
      <img src="images/KTM-Logo.png" alt="KTM">
      <img src="images/logo-suzuki-png-sans-fond.png" alt="Suzuki">
      <img src="images/Yamaha-Logo.png" alt="Yamaha">
      <img src="images/triumph-logo.png" alt="Triumph">
    </div>
  </div>

  <div class="container-fluid container-black">
    <h1>Ce que nous proposons :</h1>
    <hr>
    <div class="cards-container cards-4">

      <a href="./reprise_vente.php" class="card-link">
        <div class="card">
          <img src="images/moto_card-occasions.jpg" class="card-img-top" alt="Moto">
          <div class="card-body">
            <h5 class="card-title">Reprise / Vente</h5>
          </div>
        </div>
      </a>

      <a href="./atelier.php" class="card-link">
        <div class="card">
          <img src="images/photo_atelier.jpg" class="card-img-top" alt="Moto">
          <div class="card-body">
            <h5 class="card-title">Atelier</h5>
          </div>
        </div>
      </a>

      <a href="https://box-racing.fr/announcement/199" class="card-link">
        <div class="card">
          <img src="images/photo_prestations.jpg" class="card-img-top" alt="Moto">
          <div class="card-body">
            <h5 class="card-title">Prestations</h5>
          </div>
        </div>
      </a>

      <a href="https://box-racing.fr/announcement/199" class="card-link">
        <div class="card">
          <img src="images/kawasaki-card.jpeg" class="card-img-top" alt="Moto">
          <div class="card-body">
            <h5 class="card-title">Motos neuves</h5>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="container-fluid container-white">
    <h1>Nous retrouver :</h1>
    <hr>

    <div class="cards-container cards-2">
      <div class="card">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2634.0011428681405!2d-4.289050423749379!3d48.488553026662245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4816ad8363b3a9ed%3A0xe1e4b374d14af8af!2sBox%20Racing!5e1!3m2!1sfr!2sfr!4v1748692168543!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="googleMap"></iframe>
      </div>

      <div class="card">
        <div class="contact-info">
          <h2 class="infos-title">Infos</h2>

          <h5 href="#">Adresse : 30 Rue André Turcat, 29260 Ploudaniel</h5>
          <h5 href="tel:+33 ">Téléphone : 02 98 80 21 46</h5>
          <h5 href="mailto:contact@garage.fr">Mail : contact@box-racing.fr</h5>

          <hr>

          <div class="horaire-block">
            <div class="etat-ouverture" id="etat-ouverture">
              <!-- État de l'ouverture du garage affiché ici -->
            </div>

            <p class="jour">Lundi</p>
            <div class="horaire-ligne">
              <span>❌ Fermé</span>
            </div>

            <p class="jour">Mardi</p>
            <div class="horaire-ligne">
              <span>🕗 Matin : 9h00–12h00</span>
              <span>🕒 Après-midi : 13h30–18h30</span>
            </div>

            <p class="jour">Mercredi</p>
            <div class="horaire-ligne">
              <span>🕗 Matin : 9h00–12h00</span>
              <span>🕒 Après-midi : 13h30–18h30</span>
            </div>

            <p class="jour">Jeudi</p>
            <div class="horaire-ligne">
              <span>🕗 Matin : 9h00–12h00</span>
              <span>🕒 Après-midi : 13h30–18h30</span>
            </div>

            <p class="jour">Vendredi</p>
            <div class="horaire-ligne">
              <span>🕗 Matin : 9h00–12h00</span>
              <span>🕒 Après-midi : 13h30–18h30</span>
            </div>

            <p class="jour">Samedi</p>
            <div class="horaire-ligne">
              <span>🕗 Matin : 9h00–12h00</span>
              <span>🕒 Après-midi : 13h30–18h00</span>
            </div>

            <p class="jour">Dimanche</p>
            <div class="horaire-ligne">
              <span>❌ Fermé</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <script src="script.js"></script>

<?php include "footer.php" ?>