<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/class/Pkw.php';
require_once __DIR__ . '/class/Hund.php';

$opel = new Pkw('blau', 'Opel', 'Corsa', 'Benzin', 125);

$fluffy = new Hund('Fluffy', 'Golden Redriver');
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vererbung und Schnittstellen</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Vererbung und Schnittstellen</h1>
  </header>
  <main class="container">
    <h2>Vererbung</h2>
    <p><?= $opel ?></p>
    <?php $opel->setSpeed(80) ?>
    <p><?= $opel ?></p>

    <h2>Schnittstellen (Interfaces)</h2>
    <p><?= $fluffy ?></p>

  </main>
</body>
</html>