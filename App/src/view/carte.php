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
<!-- HEADER 
<header class="header">
  <div class="left">
    <a href="router.php?action=UsePage_carte&lang=English">
    🌐 <span>EN</span>
    </a>
  </div>

  <nav class="nav">
    <a href="router.php?action=UsePage_index&lang=Francais">Accueil</a>
    <a href="router.php?action=UsePage_carte&lang=Francais" class="active">Carte</a>
    <a href="router.php?action=UsePage_apropos&lang=Francais">À propos</a>
    <a href="router.php?action=UsePage_contact&lang=Francais">Contact</a>  
  </nav>

  <div class="burger" id="burger">
    <span></span>
    <span></span>
    <span></span>
  </div>

</header>-->

<div id="map"></div>

<aside class="filtres">
  <form method="get">

    <div class="titre">Filtres</div>

  <button id="bouton_periode">Période</button>

  <!-- PERIODE -->
  <div class="type">Période (Mois / Année)</div>
  <div class="periode" id="periode">
    <span id="mois">Juillet</span>
    <input type="range" min="01" max="12" id="sliderMois" name="mois">

    <span id="annee">2023</span>
    <input type="range" min="2020" max="2025" id="sliderAnnee" name="annee">

  </div>

    <!-- unite DE MESURE -->
    
    <div class="types">
      
      <div class="type">Type de mesure</div>
      <div class="options">
        <input type="radio" class="option" name="unite" value="PSAL">Salinité</input>
        <input type="radio" class="option" name="unite" value="CHLT">Chlorophylle A</input>
        <input type="radio" class="option" name="unite" value="TEMP">Température</input>

      </div>
    </div>

  <!-- TYPE DE PLATEFORME -->
  <div class="types">
    <div class="type">Type de plateforme</div>
      <span class="help"> ? 
        <div class="help-popup"> Description ....... 
      </div>
      </span>
    <div class="options">
      <input class="option" name="platforme" value="BO" type="radio">Boreholes/ Bottom Landers (BO)</input>
      <input class="option" name="platforme" value="CT" type="radio">CTD Profiles (CT)</input>
      <input class="option" name="platforme" value="DB" type="radio">Drifting Buoys (DB)</input>
      <input class="option" name="platforme" value="FB" type="radio">FerryBoxes (FB)</input>
      <input class="option" name="platforme" value="GL" type="radio">Gliders (GL)</input>
      <input class="option" name="platforme" value="ML" type="radio">Mini-Loggers (ML)</input>
      <input class="option" name="platforme" value="MO" type="radio">Fixed Mooring / Moored Buoys (MO)</input>
      <input class="option" name="platforme" value="PF" type="radio">Profiling Floats (PF)</input>
      <input class="option" name="platforme" value="PR" type="radio">Profiling Floats - Alternative code (PR)</input>
      <input class="option" name="platforme" value="SD" type="radio">Saildrones / Surface Drifters (SD)</input>
      <input class="option" name="platforme" value="TG" type="radio">Tide Gauges (TG)</input>
      <input class="option" name="platforme" value="TS" type="radio">ThermoSalinographs (TS)</input>  
      <input class="option" name="platforme" value="XB" type="radio">Expendable Bathythermographs (XB)</input>
    </div>
    
    <input  type="submit" value="Appliquer"></input>


    <input type="hidden" name="action" value="UsePage_carte">
    <input type="hidden" name="lang" value="Francais">


  </form>
</aside>

<!-- carte -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<!-- CARTE -->
<script>
const map = L.map('map', {
  center: [46.5, 2.5], 
  zoom: 6,
  minZoom: 4
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);

</script>

<!-- marqueur -->
<?php

echo "<script>";
foreach  ($dataSet as $obj) {
  
  echo "L.marker([".$obj->getLatitude().",".$obj->getLongitude()."])
  .bindPopup(`<strong>Valeur :</strong> ".$obj->getValeur()." ". $obj->getUnite()."<br>
  <strong>Date :</strong> ".$obj->getDate()."<br>
  <strong>Id plateforme :</strong>". $obj->getIdPlateforme()."<br>
  <strong>Type plateforme :</strong> ".$obj->getPlateformeType()."<br>
  <strong>Description :</strong> ".$obj->getPlateformeTypeDesc()."<br>
  `).addTo(map);";
}
echo "</script>";
?>






<!-- FILTRES -->
<script>
const sliderAnnee = document.getElementById("sliderAnnee");
const sliderMois = document.getElementById("sliderMois");
const annee = document.getElementById("annee");
const mois = document.getElementById("mois");

const moisNoms = [
  "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
  "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];

/* afficher année */
sliderAnnee.addEventListener("input", () => {
  annee.textContent = sliderAnnee.value;
});

/* afficher mois */
sliderMois.addEventListener("input", () => {
  mois.textContent = moisNoms[sliderMois.value];
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
