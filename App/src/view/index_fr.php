<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/index.css">
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
    <a href="router.php?action=UsePage_index&lang=English">
      🌐 <span>EN</span>
    </a>
  </div>
  
  <button class="burger" aria-label="Menu">
    ☰
  </button>

  <nav class="glass-nav">
    <ul class="glass-menu">
      <li class="active">
        <i class="fa fa-home"></i>
        <a href="router.php?action=UsePage_index&lang=Francais">Accueil</a>
      </li>
      <li>
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

<!-- SECTION ACCUEIL -->
<section class="hero">
  <div class="overlay"></div>

  <div class="hero-content">
    <h1>
      BIENVENUE SUR <span class="site_nom">GL'EAUBAL</span>
    </h1>

    <p>
      Le changement climatique est un des enjeux majeurs que nous vivons aujourd’hui
      en affectant les océans, provoquant une hausse des températures, une perturbation
      de la biodiversité marine mais encore une acidification de l’eau.<br><br>

      Ces phénomènes sont invisibles à l’œil nu mais sont importants à comprendre afin
      de prévoir les conséquences sur le long terme et si possible éviter le pire.<br><br>

      Notre application permet de visualiser les effets du changement climatique
      sur les océans à partir de différentes API.
    </p>
  </div>
</section>
<a href="router.php?action=UsePage_carte&lang=Francais" class="boutonScroll" aria-label="Accéder à la carte">
  →
</a>

<!-- CONTENU PAGE ACCUEIL !-->
<section class="impact">

  <h2>L'impact du changement climatique</h2>

  <div class="stats">
    <div class="stat">
      <span class="donnees" data-target="1.4">0</span>
      <p>°C de hausse moyenne mondiale</p>
    </div>

    <div class="stat">
      <span class="donnees" data-target="40">0</span>
      <p>% de banquise arctique perdue</p>
    </div>

    <div class="stat">
      <span class="donnees" data-target="532">0</span>
      <p>milliards de tonnes de glace perdues (Groenland)</p>
    </div>
  </div>

  <div class="themes">
    <a href="router.php?action=UsePage_phenomenes&lang=Francais#temp" class="carte">
      <h3>Hausse des températures & fonte des glaces</h3>
      <p>CO₂, sécheresses, banquise, montée des eaux, glaciers</p>
    </a>

    <a href="router.php?action=UsePage_phenomenes&lang=Francais#acid" class="carte">
      <h3>Acidification des océans</h3>
      <p>pH, coraux, biodiversité, CO₂</p>
    </a>

    <a href="router.php?action=UsePage_phenomenes&lang=Francais#sal" class="carte">
      <h3>Variation de la salinité</h3>
      <p>Evaporation, précipitations, PSU, estuaires</p>
    </a>
  </div>
</section>

<!-- DONNEES TELECHARGEES !-->
<section class="downloads">
  <h2>Données téléchargeables</h2>
  <div class="downloads-grid">
    <div class="download-card">
      <h3>Température</h3>
      <p>Données de température de surface des océans</p>
      <a href="../assets/downloads/temp.csv" class="bouton-download">
        Télécharger CSV
      </a>
    </div>

    <div class="download-card">
      <h3>Chlorophylle A</h3>
      <p>Indicateur de la concentration de phytoplancton</p>
      <a href="../assets/downloads/" class="bouton-download">
        Télécharger CSV 
      </a>
    </div>

    <div class="download-card">
      <h3>Salinité</h3>
      <p>Mesures de la salinité des eaux</p>
      <a href="../assets/downloads/" class="bouton-download">
        Télécharger CSV 
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
      Adresse : 122 Rue Paul Armangot,<br>
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
    <strong>Membres de l’équipe</strong><br>
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
  © Gl'eaubal 2025-2026 Tous droits réservés | Mentions légales
</div>

<!-- animations javascript pour les cartes info -->
<script>
document.addEventListener("DOMContentLoaded", () => {

  const cards = document.querySelectorAll(".carte");
  const counters = document.querySelectorAll(".donnees");
  const impact = document.querySelector(".impact");
  let countersDone = false;

  function checkScroll() {

    /* animation des chiffres */
    if (!countersDone && impact.getBoundingClientRect().top < window.innerHeight * 0.8) {
      countersDone = true;

      counters.forEach(counter => {
        const target = +counter.dataset.target;
        let value = 0;
        const step = target / 150;

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
