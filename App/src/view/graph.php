<?php
$idPlateforme = $idPlateforme ?? '';
$rows = $series ?? [];

// pivot by year
$byYear = [];
foreach ($rows as $r) {
  $y = (int)$r['annee'];
  $u = $r['unite'];
  $m = (float)$r['moyenne'];

  if (!isset($byYear[$y])) $byYear[$y] = ['TEMP'=>null,'PSAL'=>null,'CHLT'=>null];
  if (array_key_exists($u, $byYear[$y])) $byYear[$y][$u] = $m;
}
ksort($byYear);

$labels = array_keys($byYear);
$temp = $psal = $chlt = [];
foreach ($byYear as $vals) {
  $temp[] = $vals['TEMP'];
  $psal[] = $vals['PSAL'];
  $chlt[] = $vals['CHLT'];
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Graph – <?= htmlspecialchars($idPlateforme) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h1>Platform <?= htmlspecialchars($idPlateforme) ?></h1>

<canvas id="chart" style="max-width:1100px;height:420px"></canvas>

<script>
new Chart(document.getElementById('chart'), {
  type: 'line',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [
      { label: "Temperature (°C)", data: <?= json_encode($temp) ?>, spanGaps: true },
      { label: "Salinity (psu)", data: <?= json_encode($psal) ?>, spanGaps: true },
      { label: "Chlorophyll A (mg/m³)", data: <?= json_encode($chlt) ?>, spanGaps: true }
    ]
  },
  options: {
    responsive: true,
    interaction: { mode: 'index', intersect: false },
    plugins: { legend: { position: 'bottom' } },
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>

</body>
</html>
