<?php
declare(strict_types=1);
$start = 20; 
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>While (Übung K4-3)</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>K4 Übung 3, Bewertung while- und do-while-Schleife</h1>
  </header>
  <main class="container">
    <p>while-Schleife (Startwert: <?= $start ?>)</p>

    <p>
      <?php
        $zahl = $start;
        while( $zahl <= 5) {
          echo "$zahl<br>";
          $zahl++;
        }
      ?>
    </p>

    <hr>
    
    <p>do-while-Schleife (Startwert: <?= $start ?>)</p>

    <p>
      <?php
        $zahl = $start;
        do {
          echo "$zahl<br>";
          $zahl++;
        } while( $zahl <= 5);
      ?>
    </p>

  </main>
</body>
</html>