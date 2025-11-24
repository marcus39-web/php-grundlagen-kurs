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
  <title>Zeit-Funktionen</title>
  <link rel="stylesheet" href="../../../php_kurs_woche2/materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Zeitfunktionen</h1>
    <!-- Hauptüberschrift -->
  </header>
  <main class="container">
    <!-- Beispiel für die Funktion mktime() -->
    <h2><code>mktime()</code></h2>
    <p>Syntax: <code>mktime( Std, Min, Sek, Monat, Tag, Jahr )</code></p>
    <?php
    // Beispiel: Berechnung der Tage zwischen zwei Daten
    $tag = 15;
    $monat = 1;
    $jahr = 1969;

    // Erzeuge einen Unix-Timestamp für das Startdatum
    $start = mktime(0, 0, 0, $monat, $tag, $jahr);
    // Berechne die Differenz in Sekunden zwischen jetzt und dem Startdatum
    $diff = time() - $start;
    ?>
    <p><b><?= (floor($diff / 86400)) ?> Tage</b> liege zwischen heute (<?= date('d.m.Y') ?>) und dem <?= date('d.m.Y', $start) ?>.</p>

    <!-- Beispiel für die Funktion microtime() -->
    <h2><code>microtime()</code></h2>
    <p>Liefert die Anzahl der Microsekunden laut UTC-Zeitstempel.</p>
    <p>Zum Vergleich <code>time():</code> <?= time() ?></p>
    <p><strong>Variante 1:</strong> ohne Parameter <?= microtime() ?> .</p>
    <p><strong>Variante 2:</strong> mit Parameter <?= microtime(true) ?> .</p>

    <!-- Beispiel: Zeitmessung einer Berechnung -->
    <h3>Beispiel: Berechnung Quadratwurzel von 1 - 1.000.000</h3>
    <?php 
    // Startzeit erfassen
    $start = microtime(true);
    for($i = 1; $i <= 1000000; $i++) {
      $quadratwurzel = sqrt($i);
    }
    // Endzeit erfassen
    $ende = microtime(true);
    ?>

    <p>Ausführungsdauer: <?= $ende - $start ?> Sekunden.</p>
    <p>Ausführungsdauer: <?= $ende - $start ?> Sekunden.</p>

    <!-- Beispiel für die Funktion checkdate() -->
    <h2><code>checkdate()</code></h2>
    <p>Prüft ein übergebenes Datum auf Richtigkeit.</p>

    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
      <p>Geben Sie ein beliebiges Datum im Format TT.MM.JJJJ ein!</p>
      <p><input type="date" name="datum" size="10" maxlength="10"></p>
      <p><button type="submit">Prüfen</button></p>
    </form>
    <?php 
    // Prüfe, ob das Formular gesendet wurde
    if( ! empty($_POST) ) {
      // Die einzelnen Teile der Datumseingabe in ein Array überführen
      $data = explode('-', $_POST['datum']);

      // Prüfe das Datum auf korrektes Format und auf das Vorhandensein aller drei Teile
      if( (count($data) != 3) || ( ! checkdate((int)$data[1], (int)$data[2], (int)$data[0]) ) ): ?>
        <p><?= $_POST['datum'] ?> ist <b>kein</b> korrektes Datum.</p>
      <?php else: ?>
        <p>Das Datum <?= $_POST['datum'] ?> ist korrekt.</p>
      <?php endif;
      }
    ?>
  </main>
</body>
</html>