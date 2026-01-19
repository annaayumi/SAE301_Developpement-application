<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Map</title>

<link rel="stylesheet" href="../assets/css/carte.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


  <!-- HEADER -->
  <header class="header">
    <div class="left">
      <!-- logo ici -->
    </div>
    <div class="lang">
      <a href="router.php?action=UsePage_carte&lang=Francais">
      🌐 <span>EN</span>
      </a>
    </div>

  <nav class="nav">
    <a href="router.php?action=UsePage_index&lang=English">Welcome</a>
    <a href="router.php?action=UsePage_carte&lang=English" class="active">Map</a>
    <a href="router.php?action=UsePage_apropos&lang=English">About</a>
    <a href="router.php?action=UsePage_contact&lang=English">Contact</a>
  </nav>

  <div class="burger" id="burger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>


<body>
<div id="map"></div>

<aside class="filtres">
  <div class="titre">Filters</div>

<div class="type">Période</div>
  <div class="periode" id="periode">
    <span id="annee">2023</span>
    <input type="range" min="2020" max="2025" id="slider">
  </div>

  <!-- TYPE DE MESURE -->
  <div class="types">
    <div class="type">Type of measurement</div>
    <div class="options">
      <button class="option">Salinity</button>
      <button class="option">Chlorophyll A</button>
      <button class="option">Temperature</button>
    </div>
  </div>

  <!-- TYPE DE PLATEFORME -->
  <div class="types">
    <div class="type">Type of platform</div>
    <div class="options">
      <button class="option">Boreholes/ Bottom Landers (BO)</button>
      <button class="option">CTD Profiles (CT)</button>
      <button class="option">Drifting Buoys (DB)</button>
      <button class="option">FerryBoxes (FB)</button>
      <button class="option">Gliders (GL)</button>
      <button class="option">Mini-Loggers (ML)</button>
      <button class="option">Fixed Mooring / Moored Buoys (MO)</button>
      <button class="option">Profiling Floats (PF)</button>
      <button class="option">Profiling Floats - Alternative code (PR)</button>
      <button class="option">Saildrones / Surface Drifters (SD)</button>
      <button class="option">Tide Gauges (TG)</button>
      <button class="option">ThermoSalinographs (TS)</button>  
      <button class="option">Expendable Bathythermographs (XB)</button>
    </div>
  </div>
</aside>

<!-- carte -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
const map = L.map('map', {
  center: [46.5, 2.5], 
  zoom: 6,
  minZoom: 4
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

<!-- scripts filtres période -->
<script>
const slider = document.getElementById("slider");
const annee = document.getElementById("annee");

/* permet d'afficher l'année */
slider.addEventListener("input", () => {
  annee.textContent = slider.value;
});
</script>

<script>
const filtres = document.querySelector(".filtres");
const dragBar = document.querySelector(".titre");

let isDragging = false;
let offsetX = 0;
let offsetY = 0;

dragBar.addEventListener("mousedown", (e) => {
  isDragging = true;
  offsetX = e.clientX - filtres.offsetLeft;
  offsetY = e.clientY - filtres.offsetTop;
  dragBar.style.cursor = "grabbing";
});

/* déplacer le filtre */
document.addEventListener("mousemove", (e) => {
  if (!isDragging) return;

  filtres.style.left = (e.clientX - offsetX) + "px";
  filtres.style.top  = (e.clientY - offsetY) + "px";
});

document.addEventListener("mouseup", () => {
  isDragging = false;
  dragBar.style.cursor = "grab";
});
</script>

<script>
const options = document.querySelectorAll(".option");

options.forEach(option => {
  option.addEventListener("click", () => {
    option.classList.toggle("active");

    console.log("Sélections actuelles :");
    document.querySelectorAll(".option.active").forEach(btn => {
      console.log(btn.dataset);
    });
  });
});
</script>

</body> 
</html>
