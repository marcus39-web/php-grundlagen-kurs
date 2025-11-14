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
  <title>PHP-Dateien einbinden</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>PHP-Dateien einbinden mit <code>include</code> bzw. <code>require</code></h1>
  </header>
  <main class="container">
    <?php
      
    /**
     * 4 Varianten der Einbindung
     * 
     * include        liefert eine Warnung, wenn die einzubindende Datei nicht existiert
     * require        liefert einen Fatal Error, wenn die einzubindende Datei nicht existiert
     * include_once
     * require_once   unterbinden eine Mehrfacheinbindung der Dateien
     */

    require_once 'functions.inc.php';
    require_once 'functions.inc.php';
      
    echo '<p>' . summe(35, 7) . '</p>'
    ?>
  </main>
</body>
</html>