<?php
declare(strict_types=1);
session_start();
error_reporting(E_ALL);
ini_set('display_errors',true);
include_once 'artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deiteiname</title>
  <link rel="stylesheet" href="../../../style.css">
  
</head>
<body>
  <header>
    <div class="container">
      <h1>Meine Website</h1>
    </div>
  </header>
  <main>
    <div class="container">
      <?php $name = "Marcus"; ?>
      <div class="card" style="max-width: 500px; margin: 32px auto;">
        <div style="padding: 24px;">
          <h2>Hallo <?= htmlspecialchars($name) ?>!</h2>
          <p>Dies ist ein kurzer PHP-Ausgabe-Test <b>ohne Tailwind</b>.</p>
          <button>Klick mich</button>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="container">
      <p>&copy; <?= date('Y') ?> Meine Website. Alle Rechte vorbehalten.</p>
    </div>
  </footer>
</body>
</html>