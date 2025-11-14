<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular zur Eingabe von Daten</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Session: Angaben zur Person</h1>
  </header>
  <main class="container">
    
  <form action="session-auswertung.php" method="post">
    <label>Vorname:
      <input type="text" name="vorname">
    </label>
    <label>Nachname:
      <input type="text" name="nachname">
    </label>
    <label>Wohnort:
      <input type="text" name="ort">
    </label>
    <button type="submit">Senden</button>
  </form>
    
  </main>
</body>
</html>