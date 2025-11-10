<?php
declare(strict_types=1);
$name = "Marcus";
$age = 55;
$city = "Legefeld";
$birthYear = date("Y") - $age;
$gebJahr = $aktJahr - $age;
/**
 * Aufgabe:
 * 1) Lege Variablen für name, alter, stadt an.
 * 2) Gib einen formatierten Satz aus (HTML + CSS).
 * 3) Bonus: Rechne ein Geburtsjahr aus.
 */
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 2 – Personeninfo</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 2 – Personeninfo</h1></header>
  <main class="container">
    <p>Hallo <?= htmlspecialchars($name); ?>, du bist <?= $age; ?> Jahre alt und wohnst in <?= htmlspecialchars($city); ?>.</p>
    <p>Du wurdest im Jahr <?= $birthYear; ?> geboren.</p>
  </main>
</body>
</html>
