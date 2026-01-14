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
    <a href="router.php?action=UsePage_donnees&lang=Francais">Données</a>
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

    <span>Période</span>

    <!-- PERIODE -->
    <div class="periode" id="periode">
      <span id="annee">2023</span>
      <input type="range" min="2020" max="2025" name="annee" id="slider">

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
      <div class="options">
        <input type="radio" class="option" name="platforme" value="satellite">Satellite</input>
        <input type="radio" class="option" name="platforme" value="DB">Bouée</input>
      </div>
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

</body> 
</html>
