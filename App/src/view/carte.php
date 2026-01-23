<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/carte.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../assets/js/menu_burger.js"></script>
  <script src="../assets/js/fonction_carte.js" ></script>
</head>

<body onload="NoResetForm()">
    <!-- HEADER -->
    <header class="header">
      <div class="lang">
        <a href="router.php?action=UsePage_carte&lang=English">
        🌐 <span>EN</span>
        </a>
      </div>

  <button class="burger" aria-label="Menu">
    ☰
  </button>

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
        <input  type="range" min="2020" max="2026" id="sliderAnnee" name="annee" value="<?php echo  $_GET['annee'] ?? '2020' ?>">
      </span>
    </div>

      <!-- UNITE DE MESURE -->
      
      <div class="types">
        
    <button type="button"  class="type " onclick="toggleFilter('uniteHide','uniteButtonCheckbox')">
      Type de mesure 
      <input type="checkbox" id="uniteButtonCheckbox" name="unite_checkbox" checked>
    </button>

        <span id="uniteHide">
          <div class="options">

          <label class="option">
            <input type="checkbox" name="unite[]" value="PSAL">
            <span>Salinité</span>
          </label>

          <label class="option">
            <input type="checkbox" name="unite[]" value="CHLT">
            <span>Chlorophylle A</span>
          </label>

          <label class="option">
            <input type="checkbox" name="unite[]" value="TEMP">
            <span>Température</span>
          </label>

          </div>
        </span>
      </div>

    <!-- TYPE DE plateforme -->
    <div class="types">
      
    <button type="button" id="bouton_periode" class="type" onclick="toggleFilter('typeplateformeHide','plateformeButtonCheckbox')">
      Type de plateforme 
      <input type="checkbox" id="plateformeButtonCheckbox" name="plateforme_checkbox" checked>
    </button>

    <span id="typeplateformeHide">
      <div class="options">
      <label class="option">
        <input type="checkbox" name="plateforme[]" value="BO">
        <span>Boreholes / Bottom Landers (BO)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="CT">
        <span>CTD Profiles (CT)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="DB">
        <span>Drifting Buoys (DB)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="FB">
        <span>FerryBoxes (FB)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="GL">
        <span>Gliders (GL)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="ML">
        <span>Mini-Loggers (ML)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="MO">
        <span>Fixed Mooring / Moored Buoys (MO)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="PF">
        <span>Profiling Floats (PF)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="PR">
        <span>Profiling Floats – Alternative code (PR)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="SD">
        <span>Saildrones / Surface Drifters (SD)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="TG">
        <span>Tide Gauges (TG)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="TS">
        <span>ThermoSalinographs (TS)</span>
      </label>

      <label class="option">
        <input type="checkbox" name="plateforme[]" value="XB">
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
      function NoResetForm(){

        const sliderAnnee = document.getElementById("sliderAnnee");
        const sliderMois = document.getElementById("sliderMois");
        const annee = document.getElementById("annee");
        const mois = document.getElementById("mois");

        // Periode slider anti reset
        annee.textContent = sliderAnnee.value;
        mois.textContent = moisNoms[sliderMois.value-1];


        const input_list = document.getElementsByTagName("input");
        console.log(input_list);
        


        // hide or not depending on checkbox state
        <?php echo isset($_GET['date_checkbox']) ? "": "toggleFilter('periodeHide','periodeButtonCheckbox');" ?>
        <?php echo isset($_GET['unite_checkbox']) ? "": "toggleFilter('uniteHide','uniteButtonCheckbox');" ?>
        <?php echo isset($_GET['plateforme_checkbox']) ? "": "toggleFilter('typeplateformeHide','plateformeButtonCheckbox');" ?>
      

        // unite checkbox reactivate

        unite_list = new Array();
        <?php
          foreach($_GET['unite']?? [] as $i){
            echo "unite_list.push('".$i."');";
          }?>
          
        console.log(unite_list);

        unite_list.forEach((unite) => {

          for (let item of input_list) {
            if (item.value == unite){
              item.setAttribute("checked","TRUE");
            }
          }
        })
        

        // plateforme checkbox reactivate

        plateforme_list = new Array();
        <?php
          foreach($_GET['plateforme'] ?? [] as $i){
            echo "plateforme_list.push('".$i."');";
          }?>
        console.log(plateforme_list);


        plateforme_list.forEach((plateforme) => {

          for (let item of input_list) {
            if (item.value == plateforme){
              item.setAttribute("checked","TRUE");
            }
          }
        })
      }


      //filtres
      const sliderAnnee = document.getElementById("sliderAnnee");
      const sliderMois = document.getElementById("sliderMois");
      const annee = document.getElementById("annee");
      const mois = document.getElementById("mois");

      const moisNoms = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
      ];

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
