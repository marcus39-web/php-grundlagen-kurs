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
  <title>Datums-Funktionen</title>
  <link rel="stylesheet" href="../../../php_kurs_woche2/materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Datumsfunktionen</h1>
  </header>
  <main class="container">
    <h2><code>getdate()</code></h2>
    <?php echo '<pre>', print_r( getdate(), true ), '</pre>'; ?>

    <h2><code>date()</code></h2>
    <p><?= date('d.m.Y H:i:s \K\w\. W'); ?></p>
    <p>Platzhalter siehe <a href="https://www.php.net/manual/de/datetime.format.php" target="_blank">https://www.php.net/manual/de/datetime.format.php</a></p>

    <h2><code>time()</code></h2>
    <p>liefert den aktuellen Zeitstempel</p>
    <p><?= time(); ?></p>
    <?php $morgen = time() + 24 * 60 * 60; ?>
    <p>Morgen ist der <?= date('d.m.Y', $morgen) ?></p>
    <?php $vt = time() + 13 * 24 * 60 * 60 ?>
    <p>In 14 Tagen ist der <?= date('d.m.Y', $vt) ?></p>
  </main>
</body>
</html>