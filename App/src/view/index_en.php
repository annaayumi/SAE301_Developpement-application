<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../assets/js/menu_burger.js"></script>
</head>

<body>
<!-- HEADER -->
<header class="header">
  <div class="left">
    <img src="../assets/img/logo.svg" alt="Logo GL'EAUBAL" class="logo">
  </div>
  <div class="lang">
    <a href="router.php?action=UsePage_index&lang=Francais">
    🌐 <span>FR</span>
    </a>
  </div>

  <button class="burger" aria-label="Menu">
    ☰
  </button>

  <nav class="glass-nav">
    <ul class="glass-menu">
      <li class="active">
        <i class="fa fa-home"></i>
        <a href="router.php?action=UsePage_index&lang=English">Home</a>
      </li>
      <li>
        <i class="fa fa-map"></i>
        <a href="router.php?action=UsePage_carte&lang=English">Map</a>
      </li>
      <li>
        <i class="fa fa-info-circle"></i>
        <a href="router.php?action=UsePage_apropos&lang=English">About</a>
      </li>
      <li>
        <i class="fa fa-envelope"></i>
        <a href="router.php?action=UsePage_contact&lang=English">Contact</a>
      </li>
    </ul>
  </nav>
</header>


<!-- SECTION ACCUEIL -->
<section class="hero">
  <div class="overlay"></div>

  <div class="hero-content">
    <h1>WELCOME TO <span class="site_nom">GL'EAUBAL</span></h1>

    <p>
      Climate change is one of the major challenges we face today,
      affecting the oceans, causing rising temperatures, disrupting
      marine biodiversity, and even acidifying the water.<br><br>

      These phenomena are invisible to the naked eye, but it is important to understand them in order to
      predict the long-term consequences and, if possible, avoid the worst.<br><br>

      Our application allows you to visualize the effects of climate change
      on the oceans using various APIs.
    </p>
  </div>
</section>
  <a href="router.php?action=UsePage_carte&lang=English" class="boutonScroll" aria-label="Accéder à la carte">
    →
  </a>

<!-- CONTENU PAGE ACCUEIL !-->
<section class="impact">

  <h2>The impact of climate change</h2>

  <div class="stats">
    <div class="stat">
      <span class="donnees" data-target="1.4">0</span>
      <p>°C average global temperature rise</p>
    </div>

    <div class="stat">
      <span class="donnees" data-target="40">0</span>
      <p>% of Arctic sea ice lost</p>
    </div>

    <div class="stat">
      <span class="donnees" data-target="532">0</span>
      <p>milliards de tonnes de glace perdues (Groenland)</p>
    </div>
  </div>

  <div class="themes">
    <a href="router.php?action=UsePage_phenomenes&lang=English#temp" class="carte">
      <h3>Rising temperatures and melting ice</h3>
      <p>CO₂, drought, ice floe, rising waters, glaciers</p>
    </a>

    <a href="router.php?action=UsePage_phenomenes&lang=English#acid" class="carte">
      <h3>Acidification of oceans</h3>
      <p>pH, corals, biodiversity, CO₂</p>
    </a>

    <a href="router.php?action=UsePage_phenomenes&lang=English#sal" class="carte">
      <h3>Variation in salinity</h3>
      <p>Evaporation, precipitations, PSU, estuaires</p>
    </a>
  </div>

</section>

<!-- DONNEES TELECHARGEES !-->
<section class="downloads">
  <h2>Données téléchargeables</h2>  <!-- a changer en anglais (je suis pas sur) -->
  <div class="downloads-grid">
    <div class="download-card">
      <h3>Temperature</h3>
      <p>Ocean surface temperature data</p>
      <a href="../assets/downloads/" class="bouton-download">
        Download CSV
      </a>
    </div>

    <div class="download-card">
      <h3>Chlorophyll A</h3>
      <p>Indicator of phytoplankton concentration</p>
      <a href="../assets/downloads/" class="bouton-download">
        Download CSV 
      </a>
    </div>

    <div class="download-card">
      <h3>Salinity</h3>
      <p>Measurements of water salinity</p>
      <a href="../assets/downloads/" class="bouton-download">
        Download CSV 
      </a>
    </div>
  </div>
</section>


<footer class="footer">
  <!-- lien github -->
  <div class="footer-col footer-github">
    <a href="https://github.com/annaayumi/SAE301_Developpement-application"
       target="_blank"
       aria-label="GitHub GLEAUBAL">
       
      <!-- SVG github -->
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
           fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
      </svg>
    </a>
    
   <div>
      <strong>GitHub</strong><br>
      Address : 122 Rue Paul Armangot,<br>
      94400 Vitry-sur-Seine
    </div>
  </div>

  <!-- Sources -->
  <div class="footer-col">
    <strong>Sources</strong><br>
    <a href="https://www.copernicus.eu/en" target="_blank">Copernicus</a><br> 
    <a href="https://www.ifremer.fr/" target="_blank">Ifremer</a><br>
    <a href="https://www.seanoe.org/" target="_blank">Seanoe</a>
  </div>

  <!-- Membres -->
  <div class="footer-col">
    <strong>Members of the team</strong><br>
    CHEREF Rayane<br>
    FALCONNET BANEYX Simon<br>
    MARDAUS Patrick<br>
    OUSSENI-COMBO Ulrich<br>
    ZHENG Anna
  </div>

  <!-- Emails -->
  <div class="footer-col">
    <strong>E-mails</strong><br>
    rayane.cheref@etu.u-pec.fr<br>
    simon.falconnet-baneyx@etu.u-pec.fr<br>
    patrick.mardaus@etu.u-pec.fr<br>
    ulrich.ousseni-combo@etu.u-pec.fr<br>
    anna.zheng@etu.u-pec.fr
  </div>


</footer>

<div class="copyright">
  © Gl'eaubal 2025-2026 All rights reserved | Legal mentions
</div>

<!-- animations javascript -->
<script>
document.addEventListener("DOMContentLoaded", () => {

  const cards = document.querySelectorAll(".carte");
  const counters = document.querySelectorAll(".donnees");
  const impact = document.querySelector(".impact");
  let countersDone = false;

  function checkScroll() {

    /* apparition des cartes */
    cards.forEach(card => {
      if (card.getBoundingClientRect().top < window.innerHeight * 0.85) {
        card.classList.add("animate");
      }
    });

    /* animation des chiffres */
    if (!countersDone && impact.getBoundingClientRect().top < window.innerHeight * 0.8) {
      countersDone = true;

      counters.forEach(counter => {
        const target = +counter.dataset.target;
        let value = 0;
        const step = target / 80;

        function animate() {
          value += step;
          if (value < target) {
            counter.textContent = value.toFixed(1);
            requestAnimationFrame(animate);
          } else {
            counter.textContent = target;
          }
        }

        animate();
      });
    }
  }

  window.addEventListener("scroll", checkScroll);
  checkScroll(); // au cas où déjà visible
});
</script>

</body>
</html>
