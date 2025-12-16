<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Carte</title>

<link rel="stylesheet" href="css/carte.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<!-- HEADER -->
<header class="header">
  <div class="left">
    🌐 <span>EN</span>
  </div>

  <nav class="nav">
    <a href="accueil.php">Accueil</a>
    <a href="carte.php" class="active">Carte</a>
    <a href="#">Données</a>
    <a href="apropos.php">À propos</a>
    <a href="#">Contact</a>
  </nav>
</header>

<div id="map"></div>

<aside class="filters">
  <div class="filters-title">Filtre</div>
  <button>Année</button>
  <button>Type de mesure</button>
  <button>Type de plateforme</button>
</aside>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
const map = L.map('map', {
  center: [46.5, 2.5],
  zoom: 6,
  minZoom: 5,
  maxZoom: 10,
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

</body> 
</html>
