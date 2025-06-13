// Affichage ouverture garage dynamique

const horaires = {
  lundi: [], // fermé
  mardi: [
    { debut: "09:00", fin: "12:00" },
    { debut: "13:30", fin: "18:30" }
  ],
  mercredi: [
    { debut: "09:00", fin: "12:00" },
    { debut: "13:30", fin: "18:30" }
  ],
  jeudi: [
    { debut: "09:00", fin: "12:00" },
    { debut: "13:30", fin: "18:30" }
  ],
  vendredi: [
    { debut: "09:00", fin: "12:00" },
    { debut: "13:30", fin: "18:30" }
  ],
  samedi: [
    { debut: "09:00", fin: "12:00" },
    { debut: "13:30", fin: "18:00" }
  ],
  dimanche: [] // fermé
};

const jours = [
  "dimanche",
  "lundi",
  "mardi",
  "mercredi",
  "jeudi",
  "vendredi",
  "samedi"
];

function estOuvert() {
  const now = new Date();
  const jourNom = jours[now.getDay()];
  const heure = now.getHours() + now.getMinutes() / 60;

  const horaireJour = horaires[jourNom];
  if (!horaireJour || horaireJour.length === 0) return false;

  for (const plage of horaireJour) {
    const [hDebut, mDebut] = plage.debut.split(":").map(Number);
    const [hFin, mFin] = plage.fin.split(":").map(Number);

    const debut = hDebut + mDebut / 60;
    const fin = hFin + mFin / 60;

    if (heure >= debut && heure < fin) return true;
  }

  return false;
}

const etatEl = document.getElementById("etat-ouverture");
if (etatEl) {
  if (estOuvert()) {
    etatEl.textContent = "✅ Ouvert actuellement";
    etatEl.style.color = "green";
  } else {
    etatEl.textContent = "❌ Fermé actuellement";
    etatEl.style.color = "red";
  }
}


// formulaire envoi mail

function sendViaGmail() {
  const objet = document.getElementById("objet").value;
  const message = document.getElementById("message").value;

  const lien = `https://mail.google.com/mail/?view=cm&fs=1&to=evan.caudan22@gmail.com&su=${encodeURIComponent(objet)}&body=${encodeURIComponent(message)}`;

  window.open(lien, '_blank');
  return false; // Empêche le rechargement de la page
}



// Carousel mobile (page accueil et occasions)

function afficherCarouselSiPetit() {
  const carousels = document.querySelectorAll('.cards-container.cards-3, .cards-container.cards-4, .services-columns');

  if (window.innerWidth <= 768) {
    carousels.forEach(carousel => {
      carousel.classList.add('carousel');
    });
  } else {
    carousels.forEach(carousel => {
      carousel.classList.remove('carousel');
    });
  }
}


// Carousel photos (page annonces admin)

const sliders = {};

function nextSlide(id) {
    const container = document.querySelector(`#slider-${id} .slides`);
    const images = container.querySelectorAll('img');
    sliders[id] = (sliders[id] ?? 0) + 1;
    if (sliders[id] >= images.length) sliders[id] = 0;
    container.style.transform = `translateX(-${sliders[id] * 100}%)`;
}

function prevSlide(id) {
    const container = document.querySelector(`#slider-${id} .slides`);
    const images = container.querySelectorAll('img');
    sliders[id] = (sliders[id] ?? 0) - 1;
    if (sliders[id] < 0) sliders[id] = images.length - 1;
    container.style.transform = `translateX(-${sliders[id] * 100}%)`;
}

window.addEventListener('load', afficherCarouselSiPetit);

window.addEventListener('resize', afficherCarouselSiPetit);