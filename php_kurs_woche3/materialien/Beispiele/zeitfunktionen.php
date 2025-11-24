<?php
declare(strict_types=1);
error_reporting(E_ALL);
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
  </header>
  <main class="container">
    <h2><code>mktime()</code></h2>
    <p>Syntax: <code>mktime( Std, Min, Sek, Monat, Tag, Jahr )</code></p>
    <?php
      
    $tag = 15;
    $monat = 1;
    $jahr = 1969;

    $start = mktime(0, 0, 0, $monat, $tag, $jahr);
    $diff = time() - $start;
      
    ?>
    <p><b><?= (floor($diff / 86400)) ?> Tage</b> liege zwischen heute (<?= date('d.m.Y') ?>) und dem <?= date('d.m.Y', $start) ?>.</p>

    <h2><code>microtime()</code></h2>
    <p>Liefert die Anzahl der Microsekunden laut UTC-Zeitstempel.</p>
    <p>Zum Vergleich <code>time():</code> <?= time() ?></p>
    <p><strong>Variante 1:</strong> ohne Parameter <?= microtime() ?> .</p>
    <p><strong>Variante 1:</strong> mit Parameter <?= microtime(true) ?> .</p>

    <h3>Beispiel: Berechnung Quadratwurzel von 1 - 1.000.000</h3>

    <?php 
    $start = microtime(true);
    for($i = 1; $i <= 1000000; $i++) {
      $quadratwurzel = sqrt($i);
    }
    $ende = microtime(true);
    ?>

    <p>Ausführungsdauer: <?= $ende - $start ?> Sekunden.</p>

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

      // Prüfe das Datum auf korrektes Format und auf das Vorandensein aller drei Teile
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