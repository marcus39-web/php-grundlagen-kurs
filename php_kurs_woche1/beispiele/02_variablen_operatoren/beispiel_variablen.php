<?php
declare(strict_types=1);
$name = "Alex";
$age = 29;
$lucky = 7;
$sum = $age + $lucky;
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Variablen & Operatoren</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Variablen & Operatoren</h1></header>
  <main class="container">
    <p>Hallo <?= htmlspecialchars($name) ?>, du bist <?= $age ?> Jahre alt.</p>
    <p>Glückszahl: <?= $lucky ?> → Summe: <?= $sum ?></p>
  </main>
</body>
</html>
