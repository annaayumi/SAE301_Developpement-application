<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte</title>

  <link rel="stylesheet" href="../assets/css/carte.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
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

  </header>

  <div id="map"></div>

  <!-- Filtres -->
  <aside class="filtres">
    <form method="get">

      <div class="titre">Filtres</div>
    <!-- PERIODE -->
    
  <button type="button" class="type" onclick="toggleFilter('periodeHide','periodeButtonCheckbox')">
    Période (Mois / Année) 
    <input type="checkbox" id="periodeButtonCheckbox" name="date_checkbox" checked>
  </button>
    <div class="periode" id="periode">
      <span id="periodeHide">

        <span id="mois"></span>
        <input type="range" min="1" max="12" id="sliderMois" name="mois" value="<?php echo  $_GET['mois'] ?? '1' ?>">

        <span  id="annee"></span>
        <input  type="range" min="2020" max="2025" id="sliderAnnee" name="annee" value="<?php echo  $_GET['annee'] ?? '2020' ?>">
      </span>
    </div>

      <!-- UNITE DE MESURE -->
      
      <div class="types">
        
    <button type="button"  class="type " onclick="toggleFilter('typeHide','uniteButtonCheckbox')">
      Type de mesure 
      <input type="checkbox" id="uniteButtonCheckbox" name="unite_checkbox" checked>
    </button>

        <span id="typeHide">
          <div class="options">

            <label class="option">
              <input type="radio" name="unite" titlex value="PSAL">
              <span>Salinité</span>
            </label>

            <label class="option">
              <input type="radio" name="unite" value="CHLT">
              <span>Chlorophylle A</span>
            </label>

            <label class="option">
              <input type="radio" name="unite" value="TEMP">
              <span>Température</span>
            </label>

          </div>
        </span>
      </div>

    <!-- TYPE DE PLATEFORME -->
    <div class="types">
      
    <button type="button" id="bouton_periode" class="type" onclick="toggleFilter('PlatformeHide','PlateformeButtonCheckbox')">
      Type de plateforme 
      <input type="checkbox" id="PlateformeButtonCheckbox" name="plateforme_checkbox" checked>
    </button>

      <span id="PlatformeHide">
        <div class="options">
        <label class="option">
          <input type="radio" name="platforme" value="BO">
          <span>Boreholes / Bottom Landers (BO)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="CT">
          <span>CTD Profiles (CT)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="DB">
          <span>Drifting Buoys (DB)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="FB">
          <span>FerryBoxes (FB)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="GL">
          <span>Gliders (GL)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="ML">
          <span>Mini-Loggers (ML)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="MO">
          <span>Fixed Mooring / Moored Buoys (MO)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="PF">
          <span>Profiling Floats (PF)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="PR">
          <span>Profiling Floats – Alternative code (PR)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="SD">
          <span>Saildrones / Surface Drifters (SD)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="TG">
          <span>Tide Gauges (TG)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="TS">
          <span>ThermoSalinographs (TS)</span>
        </label>

        <label class="option">
          <input type="radio" name="platforme" value="XB">
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
  foreach  ($dataSet ?? [] as $obj) {
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
    
    echo "
    L.marker([".$obj->getLatitude().",".$obj->getLongitude()."])
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
  echo "</script>"

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

      function toggleFilter(filterID,checkboxID){

        targetFilter = document.getElementById(filterID)
        targetCheckbox = document.getElementById(checkboxID)

        if(targetFilter.getAttribute("hidden")){
          targetFilter.removeAttribute("hidden")
          targetCheckbox.removeAttribute("hidden")
          targetCheckbox.removeAttribute("disabled")
        }
        else{
          targetFilter.setAttribute("hidden","TRUE")
          targetCheckbox.setAttribute("hidden","TRUE")
          targetCheckbox.setAttribute("disabled","TRUE")
        }
      }

      function NoResetForm(){

      const sliderAnnee = document.getElementById("sliderAnnee");
      const sliderMois = document.getElementById("sliderMois");
      const annee = document.getElementById("annee");
      const mois = document.getElementById("mois");

        // Periode slider
        annee.textContent = sliderAnnee.value;
        mois.textContent = moisNoms[sliderMois.value-1];


        option_list = document.querySelectorAll("input[name = unite], input[name = platforme]");
        // periode span
        if(<?php echo isset($_GET['date_checkbox']) ? "true": "false" ?>){

          date = <?php echo"'".($_GET['periode'] ?? 'NULL')."'" ?>;
          console.log('run not toggle periode');
        }
        
        else{
          toggleFilter('periodeHide','periodeButtonCheckbox');
          console.log("run toggle periode")
        }

        // unite span

        if(<?php echo isset($_GET['unite']) ? "true": "false" ?>){

          unite = <?php echo"'".($_GET['unite'] ?? 'NULL')."'" ?>;
          console.log('run not toggle unite');
          console.log(option_list.length)
          for(var i = 0; option_list.length > i; i++){

            
            
            if(option_list[i].value == unite){
              console.log(option_list[i]);
              option_list[i].setAttribute("checked","TRUE");
            }
          }
        }
        else{
          toggleFilter('typeHide','uniteButtonCheckbox');
          console.log("run toggle unite")
        }

        // unite span

        if(<?php echo isset($_GET['platforme']) ? "true" : "false" ?>){

          plateforme = <?php echo "'".($_GET['platforme'] ?? 'NULL')."'"?>;
          console.log('run not toggle plateforme');
          for(var i = 0; option_list.length > i; i++){

            if(option_list[i].value == plateforme){
              console.log(option_list[i])
              option_list[i].setAttribute("checked","TRUE");
            }
          }
        }
        else{
          toggleFilter('PlatformeHide','PlateformeButtonCheckbox');
          console.log("run toggle plateforme")  
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
