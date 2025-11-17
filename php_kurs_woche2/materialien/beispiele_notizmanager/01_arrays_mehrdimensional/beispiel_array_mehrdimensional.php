<?php
declare(strict_types=1);
ini_set('display_erros', true);
$inventory = [
 [ 'name' => 'Ruckssack', 'preis' => 79.90, 'bestand' => 12 ],
 [ 'name' => 'Kletterseil', 'preis' => 129.00, 'bestand' => 5 ],
 [ 'name' => 'Karabiener', 'preis' => 8.50, 'bestand' => 40 ],
];
$total = 0.0;
foreach ($inventory as $i) {
  $total += $i['preis'] * $i['bestand'];
}
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Mehrdimensionale Arrays</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<header><h1>Mehrdimensionale Arrays</h1></header>
<main class="container">
  <div class="card">
    <h2>Lager</h2>
    <ul>
      <?php foreach ($inventory as $i): ?>
        <li><?= htmlspecialchars($i['name']) ?> - <?= number_format($i['preis'], 2, ',', '.') ?> € x <?= (int)$i['bestand'] ?></li>
        <?php endforeach ?>
    </ul>
    <p><strong>Gesamtwert:</strong> <?= number_format($total, 2, ',', '.') ?> €</p>
  </div>
</main>
</body>
</html>
