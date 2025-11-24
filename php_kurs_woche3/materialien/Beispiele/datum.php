<?php
// Aktiviert strikte Typisierung für PHP
declare(strict_types=1);
// Zeigt alle Fehler und Warnungen an
error_reporting(E_ALL);
// Fehler werden direkt im Browser angezeigt
ini_set('display_errors',true);
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datums-Funktionen</title>
  <!-- Einbindung eines Stylesheets für die Optik -->
  <link rel="stylesheet" href="../../../php_kurs_woche2/materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Datumsfunktionen</h1>
    <!-- Hauptüberschrift -->
  </header>
  <main class="container">
    <!-- Beispiel für die Funktion getdate() -->
    <h2><code>getdate()</code></h2>
    <?php 
    // Gibt ein Array mit allen aktuellen Datums- und Zeitwerten aus
    echo '<pre>', print_r( getdate(), true ), '</pre>'; 
    ?>

    <!-- Beispiel für die Funktion date() -->
    <h2><code>date()</code></h2>
    <p>
      <!-- Gibt das aktuelle Datum und die Uhrzeit im Format Tag.Monat.Jahr Stunde:Minute:Sekunde Kalenderwoche aus -->
      <?= date('d.m.Y H:i:s \K\w\. W'); ?>
    </p>
    <p>
      <!-- Link zu allen Platzhaltern für die Formatierung -->
      Platzhalter siehe <a href="https://www.php.net/manual/de/datetime.format.php" target="_blank">https://www.php.net/manual/de/datetime.format.php</a>
    </p>

    <!-- Beispiel für die Funktion time() -->
    <h2><code>time()</code></h2>
    <p>liefert den aktuellen Zeitstempel</p>
    <p>
      <!-- Gibt den aktuellen Unix-Zeitstempel aus (Sekunden seit 1.1.1970) -->
      <?= time(); ?>
    </p>
    <?php 
    // Berechnet den Unix-Zeitstempel für morgen (heute + 24h)
    $morgen = time() + 24 * 60 * 60; 
    ?>
    <p>
      <!-- Gibt das Datum für morgen aus -->
      Morgen ist der <?= date('d.m.Y', $morgen) ?>
    </p>
    <?php 
    // Berechnet den Unix-Zeitstempel für 14 Tage später (heute + 13*24h)
    $vt = time() + 13 * 24 * 60 * 60 
    ?>
    <p>
      <!-- Gibt das Datum für in 14 Tagen aus -->
      In 14 Tagen ist der <?= date('d.m.Y', $vt) ?>
    </p>
  </main>
</body>
</html>