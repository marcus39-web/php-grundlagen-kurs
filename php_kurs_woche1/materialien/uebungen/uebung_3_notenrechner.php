<?php
declare(strict_types=1);

/**
 * Aufgabe:
 * 1) Lies eine Punktzahl (0–100) ein (hart codiert oder via GET).
 * 2) Gib eine Note aus (Sehr gut / Gut / OK).
 * 3) Bonus: Farbliche Darstellung per CSS-Klasse.
 */

// Punkte aus GET-Parameter oder Standardwert
$punkte = isset($_GET['p']) ? (int)$_GET['p'] : 88;
$note = "";
$cssKlasse = "";

// Notenberechnung:
if ($punkte >= 67) {
    $note = "Sehr gut";
    $cssKlasse = "note-sehr-gut";
} elseif ($punkte >= 34) {
    $note = "Gut";
    $cssKlasse = "note-gut";
} else {
    $note = "OK";
    $cssKlasse = "note-ok";
}
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 3 – Notenrechner</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 3 – Notenrechner</h1></header>
  <main class="container">
    <!-- Eingabeformular -->
    <form method="get" action="" class="punkte-form">
      <label for="punkte">Punkte eingeben (0-100):</label>
      <input type="number" id="punkte" name="p" min="0" max="100" value="<?= $punkte; ?>" required>
      <button type="submit">Note berechnen</button>
    </form>
  
    <hr>
    
    <!-- Ergebnisanzeige -->
    <div class="note-result <?= $cssKlasse; ?>">
      <p><strong>Erreichte Punkte:</strong> <?= $punkte; ?> / 100</p>
      <p class="note-display"><strong>Note:</strong> <?= htmlspecialchars($note); ?></p>
    </div>
  </main>
  <style>
    .punkte-form {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .punkte-form label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .punkte-form input {
      padding: 10px;
      font-size: 16px;
      border: 2px solid #ddd;
      border-radius: 4px;
      width: 200px;
      margin-right: 10px;
    }
    .punkte-form button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .punkte-form button:hover {
      background-color: #0056b3;
    }
    .note-result {
      padding: 20px;
      border-radius: 8px;
      margin: 20px 0;
    }
    .note-display {
      font-size: 1.5em;
      margin-top: 10px;
    }
    .note-sehr-gut { background-color: #d4edda; border: 2px solid #28a745; }
    .note-gut { background-color: #d1ecf1; border: 2px solid #17a2b8; }
    .note-ok { background-color: #fff3cd; border: 2px solid #ffc107; }

  </style>
</body>
</html>
