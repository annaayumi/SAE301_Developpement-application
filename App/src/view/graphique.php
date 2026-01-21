<?php
$idPlateforme = $idPlateforme ?? '';
$rows = $series ?? [];

$byPeriod = [];

foreach ($rows as $r) {
  $p = $r['periode'];
  $u = $r['unite'];
  $m = (float)$r['moyenne'];

  if (!isset($byPeriod[$p])) {
    $byPeriod[$p] = ['TEMP'=>null,'PSAL'=>null,'CHLT'=>null];
  }
  if (array_key_exists($u, $byPeriod[$p])) {
    $byPeriod[$p][$u] = $m;
  }
}

ksort($byPeriod);

$labels = array_keys($byPeriod);

$temp = $psal = $chlt = [];
foreach ($byPeriod as $vals) {
  $temp[] = $vals['TEMP'];
  $psal[] = $vals['PSAL'];
  $chlt[] = $vals['CHLT'];
}

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Graphique - <?= htmlspecialchars($idPlateforme) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../assets/css/graphique.css">
</head>
<body>
<h1>Plateforme <?= htmlspecialchars($idPlateforme) ?></h1>

<div class="graph-container">
  <canvas id="chart"></canvas>
</div>

<script>
new Chart(document.getElementById('chart'), {
  type: 'line',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [
      { label: "Température (°C)", data: <?= json_encode($temp) ?>, spanGaps: true },
      { label: "Salinité (psu)", data: <?= json_encode($psal) ?>, spanGaps: true },
      { label: "Chlorophylle A (mg/m³)", data: <?= json_encode($chlt) ?>, spanGaps: true },
    ]
  },
 options: {
  responsive: true,
  maintainAspectRatio: false,
  interaction: { mode: 'index', intersect: false },
  plugins: {
    legend: {
    position: 'bottom',
    labels: {
      color: '#eaf3f6', 
      boxWidth: 14,
      boxHeight: 14
    }
  }
  },
  scales: {
    x: {
      type: 'category',
      ticks: {
        autoSkip: false,
        maxRotation: 90,
        minRotation: 90,
        color: '#ffffff'
      },
      grid: {
        color: 'rgba(255, 255, 255, 0.29)'
      },
      border: {
        color: '#ffffff'
      }
    },
    y: {
      beginAtZero: true,
      ticks: {
        color: '#eaf3f6'
      },
      grid: {
        color: 'rgba(255, 255, 255, 0.29)'
      },
      border: {
        color: '#ffffff'
      }
    }
  }
}
});
</script>
</body>
</html>
