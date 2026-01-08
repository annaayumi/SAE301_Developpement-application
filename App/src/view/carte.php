<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Carte</title>

<link rel="stylesheet" href="../assets/css/carte.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- HEADER -->
<header class="header">
  <div class="left">
    <a href="router.php?action=UsePage_carte&lang=English">
    🌐 <span>EN</span>
    </a>
  </div>

  <nav class="nav">
    <a href="router.php?action=UsePage_index&lang=Francais">Accueil</a>
    <a href="router.php?action=UsePage_carte&lang=Francais" class="active">Carte</a>
    <a href="router.php?action=UsePage_donnees&lang=Francais">Données</a>
    <a href="router.php?action=UsePage_apropos&lang=Francais">À propos</a>
    <a href="router.php?action=UsePage_contact&lang=Francais">Contact</a>  
  </nav>
</header>

<div id="map"></div>

<aside class="filtres">
  <div class="titre">Filtres</div>

  <button id="bouton_periode">Période</button>

  <div class="periode" id="periode">
    <span id="annee">2020</span>
    <input type="range" min="2020" max="2025" id="slider">
    <button id="appliquer">Appliquer</button>
  </div>

  <button>Type de mesure</button>
  <button>Type de plateforme</button>
</aside>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
const map = L.map('map', {
  center: [46.5, 2.5], 
  zoom: 6,
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);


fetch('api/releves.php?mesure=TEMP')
  .then(response => response.json())
  .then(data => {
    data.forEach(p => {
      L.circleMarker([p.latitude, p.longitude], {
        radius: 5,
        color: '#5c91dbff',
        fillOpacity: 0.8
      })
      .bindPopup(`
        <strong>Valeur :</strong> ${p.valeur}
      `)
      .addTo(map);
    });
  });
</script>


<script>
const btn = document.getElementById("bouton_periode");
const panel = document.getElementById("periode");
const slider = document.getElementById("slider");
const annee = document.getElementById("annee");

/* ouvrir et fermer */
btn.addEventListener("click", () => {
  panel.classList.toggle("active");
});

/* permet d'afficher l'année */
slider.addEventListener("input", () => {
  annee.textContent = slider.value;
});
</script>



</body> 
</html>
