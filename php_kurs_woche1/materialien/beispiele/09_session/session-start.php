<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Start einer Session</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Start einer Session</h1>
  </header>
  <main class="container">
    <p>Die Session wurde gestartet.</p>
    <p>Session-ID: <?= session_id(); ?><br>
    Name der Session: <?= session_name(); ?></p>
    <p>Speicherort des Session-Cookies auf dem Webserver: <?= ini_get('session.save_path') ?></p>

    <p>Weiter zu <a href="session-formular.php">folgenden Seite</a></p>
  </main>
</body>
</html>