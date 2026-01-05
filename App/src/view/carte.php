<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Carte</title>

<link rel="stylesheet" href="../assets/css/carte.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>

<body>

<!-- HEADER -->
<header class="header">
  <div class="left">
    🌐 <span>EN</span>
  </div>

  <nav class="nav">
    <a href="router.php?action=UsePage_index">Accueil</a>
    <a href="router.php?action=UsePage_carte" class="active">Carte</a>
    <a href="#">Données</a>
    <a href="router.php?action=UsePage_apropos">À propos</a>
    <a href="router.php?action=UsePage_contact">Contact</a>  
  </nav>
</header>

<div id="map"></div>

<aside class="filters">
  <div class="filters-title">Filtres</div>
  <button>Période</button>
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

</body> 
</html>
