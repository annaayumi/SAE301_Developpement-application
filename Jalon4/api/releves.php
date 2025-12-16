<?php
require __DIR__ . '/../config/db.php';
header('Content-Type: application/json');

$mesure = $_GET['mesure'] ?? 'TEMP';

$sql = "
SELECT r.latitude, r.longitude, r.valeur, r.date,
       m.unite, p.id AS plateforme
FROM releves r
JOIN mesure m ON r.id_mesure = m.id_mesure
JOIN plateforme p ON r.id_plateforme = p.id
WHERE m.unite = :mesure
  AND r.latitude IS NOT NULL
  AND r.longitude IS NOT NULL
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['mesure' => $mesure]);

echo json_encode($stmt->fetchAll());
