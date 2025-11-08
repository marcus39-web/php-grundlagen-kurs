<?php
declare(strict_types=1);
function brutto(float $netto, float $mwst = 0.19): float {
  return $netto * (1 + $mwst);
}
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Funktionen Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Funktionen</h1></header>
  <main class="container">
    <p>Netto: 100.00 € → Brutto: <?= number_format(brutto(100), 2, ",", ".") ?> €</p>
  </main>
</body>
</html>
