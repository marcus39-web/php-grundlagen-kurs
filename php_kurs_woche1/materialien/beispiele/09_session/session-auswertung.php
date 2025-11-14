<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daten in das Session-Array speichern</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Daten der Session speichern</h1>
  </header>
  <main class="container">
    <p>Sie haben folgendes eingetragen:
      <br>Vorname: <?= $_POST['vorname'] ?>
      <br>Nachname: <?= $_POST['nachname'] ?>
      <br>Wohnort: <?= $_POST['ort'] ?>
    </p>
    
    <?php
      
    /**
     * Das superglobale Array $_SESSION wird mit den Werten des Formulars und dem aktuellen Zeitstempel gefüllt
     */

    $_SESSION['vorname'] = $_POST['vorname'];
    $_SESSION['nachname'] = $_POST['nachname'];
    $_SESSION['ort'] = $_POST['ort'];
    $_SESSION['zeit'] = time();
      
    ?>

    <p>Folgende Daten sind nun in der Session gespeichert:</p>

    <?php echo '<pre>', print_r( $_SESSION, true ), '</pre>'; ?>


    <p>Weiter zu <a href="session-auslesen.php">folgenden Seite</a></p>
  </main>
</body>
</html>