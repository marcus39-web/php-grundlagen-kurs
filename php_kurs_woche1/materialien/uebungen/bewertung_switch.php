<?php
$punkte = 8;
$ergebnis = '';

switch($punkte) {
  case 10:
    $ergebnis = 'Sehr gut';
    break;
  case 9:
    $ergebnis = 'Gut';
    break;
  case 8:
    $ergebnis = 'Befriedigend';
    break;
  case 7:
    $ergebnis = 'Ausreichend';
    break;
  default:
    $ergebnis = 'Leider zu wenig Punkte erreicht';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bewertung (Übung K4-1)</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header>
    <h1>K4 Übung 1, Bewertung Switch</h1>
  </header>
  <main class="container">
    <p>Du hast in Deinem Test <b><?= $punkte ?></b> erreicht.</p>
    <p>Dein Testergebnis: <b><?= $ergebnis ?></b></p>
  </main>
</body>
</html>