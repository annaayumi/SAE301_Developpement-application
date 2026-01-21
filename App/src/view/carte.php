<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Carte</title>

<link rel="stylesheet" href="../assets/css/carte.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body onload="NoResetForm()">
  <!-- HEADER -->
  <header class="header">
    <div class="left">
      <!-- logo ici -->
    </div>
    <div class="lang">
      <a href="router.php?action=UsePage_carte&lang=English">
      🌐 <span>EN</span>
      </a>
    </div>

<div class="glass-header">
  <nav class="glass-nav">
    <ul class="glass-menu">
      <li>
        <i class="fa fa-home"></i>
        <a href="router.php?action=UsePage_index&lang=Francais">Accueil</a>
      </li>
      <li class="active">
        <i class="fa fa-map"></i>
        <a href="router.php?action=UsePage_carte&lang=Francais">Carte</a>
      </li>
      <li>
        <i class="fa fa-info-circle"></i>
        <a href="router.php?action=UsePage_apropos&lang=Francais">À propos</a>
      </li>
      <li>
        <i class="fa fa-envelope"></i>
        <a href="router.php?action=UsePage_contact&lang=Francais">Contact</a>
      </li>
    </ul>
  </nav>
</div>
</header>

<div id="map"></div>

<!-- Filtres -->
<aside class="filtres">
  <form method="get">

    <div class="titre">Filtres</div>
  <!-- PERIODE -->
   
  <button type="button" class="type" onclick="toggleFilter('periodeHide','periodeButtonCheckbox')">Période (Mois / Année) 
      <input type="checkbox" id="typeButtonCheckbox" hidden>
      <input type="checkbox" id="typeButtonCheckbox"checked>
  </button>
  <div class="periode" id="periode">
    <span id="periodeHide">

      <span id="mois"></span>
      <input type="range" min="1" max="12" id="sliderMois" name="mois" value="<?php echo isset($_GET['mois']) ? $_GET['mois'] : '1' ?>">

      <span  id="annee"></span>
      <input  type="range" min="2020" max="2026" id="sliderAnnee" name="annee" value="<?php echo isset($_GET['annee']) ? $_GET['annee'] : '2020' ?>">
    </span>
  </div>

    <!-- UNITE DE MESURE -->
    
    <div class="types">
      
      <button type="button"  class="type " onclick="toggleFilter('typeHide','typeButtonCheckbox','')">Type de mesure 
        <input type="checkbox" id="typeButtonCheckbox" hidden>
        <input type="checkbox" id="typeButtonCheckbox"checked>
      </button>

      <span id="typeHide">
        <div class="options">

          <label class="option">
            <input type="checkbox" name="unite" value="PSAL">
            <span>Salinité</span>
          </label>

          <label class="option">
            <input type="checkbox" name="unite" value="CHLT">
            <span>Chlorophylle A</span>
          </label>

          <label class="option">
            <input type="checkbox" name="unite" value="TEMP">
            <span>Température</span>
          </label>

        </div>
      </span>
    </div>

  <!-- TYPE DE PLATEFORME -->
  <div class="types">
    
    <button type="button" id="bouton_periode" class="type" onclick="toggleFilter('typePlatformeHide','typePlatformeButtonCheckbox')">Type de plateforme 
      <input type="checkbox" id="typeButtonCheckbox" hidden>
      <input type="checkbox" id="typeButtonCheckbox"checked>
    </button>

    <span id="typePlatformeHide">
      <div class="options">
      <label class="option">
        <input type="checkbox" name="platforme" value="BO">
        <span>Boreholes / Bottom Landers (BO)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="CT">
        <span>CTD Profiles (CT)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="DB">
        <span>Drifting Buoys (DB)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="FB">
        <span>FerryBoxes (FB)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="GL">
        <span>Gliders (GL)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="ML">
        <span>Mini-Loggers (ML)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="MO">
        <span>Fixed Mooring / Moored Buoys (MO)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="PF">
        <span>Profiling Floats (PF)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="PR">
        <span>Profiling Floats – Alternative code (PR)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="SD">
        <span>Saildrones / Surface Drifters (SD)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="TG">
        <span>Tide Gauges (TG)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="TS">
        <span>ThermoSalinographs (TS)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="platforme" value="XB">
        <span>Expendable Bathythermographs (XB)</span>
      </label>

    </div>
  </span>
    
    <input  type="submit" value="Appliquer">

    <input type="hidden" name="action" value="UsePage_carte">
    <input type="hidden" name="lang" value="Francais">


  </form>
</aside>

<!-- Import leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<!-- CARTE -->
<script>
const map = L.map('map', {
  center: [46.5, 2.5], 
  zoom: 5,
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
  $tempUnite = "";
  if ($obj->getUnite() == "TEMP"){
    $tempUnite = "°C";
  }
  if ($obj->getUnite() == "PSAL"){
    $tempUnite = "psu";
  }
  if ($obj->getUnite() == "CHLT"){
    $tempUnite = "mg/m<sup>-3</sup>";
  }
  
  echo "L.marker([".$obj->getLatitude().",".$obj->getLongitude()."])
  .bindPopup(`<strong>Valeur :</strong> ".$obj->getValeur()." ". $tempUnite."<br>
  <strong>Date :</strong> ".$obj->getDate()."<br>
  <strong>Id plateforme :</strong>". $obj->getIdPlateforme()."<br>
  <strong>Type plateforme :</strong> ".$obj->getPlateformeType()."<br>
  <strong>Description :</strong> ".$obj->getPlateformeTypeDesc()."<br>
  <strong>Graphique de la plateforme :</strong>
  <a href=\"router.php?action=UsePage_graphique&lang=Francais&idPlateforme=".$obj->getIdPlateforme()."\">
  Voir le graphique
  </a>
  `).addTo(map);";
}
echo "</script>";
?>







<script>

  //filtres
const sliderAnnee = document.getElementById("sliderAnnee");
const sliderMois = document.getElementById("sliderMois");
const annee = document.getElementById("annee");
const mois = document.getElementById("mois");

const moisNoms = [
  "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
  "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];

function toggleFilter(filterID,checkboxId){

targetFilter = document.getElementById(filterID)
targetCheckbox = document.getElementById(checkboxId)

if(targetFilter.getAttribute("hidden")){
  targetFilter.removeAttribute("hidden")
  targetCheckbox.removeAttribute("hidden")
}
else{
  targetFilter.setAttribute("hidden","")
  targetCheckbox.setAttribute("hidden","")
}


}

function NoResetForm(){

  // Periode
  annee.textContent = sliderAnnee.value;
  mois.textContent = moisNoms[sliderMois.value-1];


  if(<?php 
    echo isset($_GET['unite']);
  ?>){
    //
  }




}


// afficher année 
sliderAnnee.addEventListener("input", () => {
  annee.textContent = sliderAnnee.value;
});

// afficher mois 
sliderMois.addEventListener("input", () => {
  mois.textContent = moisNoms[sliderMois.value-1];
});

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
