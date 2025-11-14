<?php
$punkte = 8;
$ergebnis = '';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bewertung (Übung K4-2)</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header>
    <h1>K4 Übung 2, Bewertung Switch-2</h1>
  </header>
  <main class="container">
    <?php 
    for( $i = 10; $i > 0; $i-- ) {
      switch($i) {
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

      echo "<p>$i Punkte ergeben folgende Bewertung: $ergebnis</p>";
    }
    ?>
  </main>
</body>
</html>