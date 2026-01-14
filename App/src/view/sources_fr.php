<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Sources</title>

<link rel="stylesheet" href="../assets/css/sources.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<header class="header">
  <div class="left">
    <a href="router.php?action=UsePage_apropos&lang=English">
    🌐 <span>EN</span>
    </a>
  </div>

  <nav class="nav">
    <a href="router.php?action=UsePage_index&lang=Francais">Accueil</a>
    <a href="router.php?action=UsePage_carte&lang=Francais">Carte</a>
    <a href="router.php?action=UsePage_apropos&lang=Francais" class="active">À propos</a>
    <a href="router.php?action=UsePage_contact&lang=Francais">Contact</a>
  </nav>

  <div class="burger" id="burger">
    <span></span>
    <span></span>
    <span></span>
  </div>

</header>

<a href="router.php?action=UsePage_apropos&lang=Francais" class="bouton-retour">
  ← Retour
</a>

<section class="sources">

  <h1>Sources de données scientifiques</h1>
  <p class="intro">
    Les données utilisées dans GLEAUBAL proviennent de différents organismes scientifiques reconnus.
    Elles permettent d’analyser l’évolution des océans et les impacts du changement climatique.
  </p>

    <!-- Copernicus -->
    <div class="source-card">
      <h2>Copernicus</h2>
      <p>
        Programme européen d’observation de la Terre par satellite.
        Copernicus possède une vision sur le monde entier grâce à ses satellites.
      </p>
    </div>

    <!-- Ifremer -->
    <div class="source-card">
      <h2>Ifremer</h2>
      <p>
        Institut français spécialisé dans les sciences marines.
        Ifremer possède une vision limitée car il s’étend principalement sur la France et les
        outre-mer notamment avec ses océans et la biodiversité marine qui lui sont liés mais aussi une
        implication à l’international en publiant à l’échelle mondiale.
      </p>
    </div>

    <!-- SeaNoe -->
    <div class="source-card">
      <h2>SeaNoe</h2>
      <p>
        Plateforme ouverte de partage de données scientifiques marines.
      </p>
    </div>

  </div>

</section>


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
  © Gleaubal 2025-2026 Tous droits réservés | Mentions légales
</div>

</body>
</html>
