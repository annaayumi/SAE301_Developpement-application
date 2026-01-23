<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>ERROR 404</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/error.css">
</head>

<body>

  <h1>ERROR 404</h1>
  <div class="mini_jeu">
    <div id="timer">Temps / Time : 40s</div>
    <div class="score_game">
      <span id="score">0</span> / 404
    </div>
  </div>

  <div id="game"></div>

  <!-- écran de fin -->
  <div id="end">
    <div class="end-box">
      <h1 class="end-score">
        <span id="score-fin">0</span>
      </h1>

      <p class="end-message">
        Bravo, tu as sauvé les lemmings !
      </p>

      <a href="router.php?action=UsePage_index&lang=Francais" class="bouton_retour">
        Retour au site / Back to website
      </a>
    </div>
  </div>

  <script src="../assets/js/error_game.js"></script>
</body>
</html>
