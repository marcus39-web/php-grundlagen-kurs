<?php
declare(strict_types=1);
$score = 93;
$note = "";
 
// Score größer als 90 = Sehr gut, größer als 75 = Gut, alles andere = OK
if ($score > 90) {
    $note = "Sehr gut";
} elseif ($score > 75) {
    $note = "Gut";
} else {
    $note = "OK";
}
 
?>
 
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>If/Else Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Kontrollstrukturen</h1></header>
  <main class="container">
    <p> Punkte: <?= $score; ?> -> Note: <strong class= "<?= $note === 'Sehr gut' ? 'good' : ($note === 'Gut' ? 'ok' : 'bad') ?>"> <?= $note; ?> </strong></p>
 
    <h2>Der Spaceship-Operator <code><=></code></h2>
    <?php
     
      $i = 7;
      $k = 6;
 
      /**
       * Der Spaceship-Operator <=> gibt -1, 0 oder 1 zurück, je nachdem ob der linke Wert kleiner, gleich oder größer als der rechte Wert ist.
       * 1 : der Linker Wert ist größer
       * 0 : beide Werte sind gleich
       * -1 : der rechte Wert ist größer
      **/
 
      $erg = $i <=> $k; // gibt 1 zurück, da 7 > 6
      echo "<p>Ergebnis des Spaceship-Operators (7<=>6): $erg </p>";
     
    ?>
 
    <h2>Der Null coalescing Operator <code>??</code></h2>
    <?php
     
      $x = 5;
      // $y = null;
      $z = $y ?? $x; // gibt 5 zurück, da $y null ist
      echo '<p>Ergebnis des Null coalescing Operators (null ?? 5):' . $z . '</p>';
     
    ?>
 
    <h2>Switch</h2>
    <?php
     
      $tag = 'Dienstag';
 
      echo '<p>';
      switch($tag) {
        case 'Samstag':
        case 'Sonntag':
          echo 'Wochenende! Zeit zum Entspannen.';
          break;
        default:
          echo 'Arbeitstag. Zeit, produktiv zu sein.';
          break;
      }
      echo '</p>';
 
      $gewicht = 32;
      echo '<p>Das Gepäckstück wiegt ' . $gewicht . ' kg. Es gehört zur Kategorie';
      switch(true) {
        case ($gewicht <= 20):
          echo ' S (bis 20kg)';
          break;
        case ($gewicht <= 50):
          echo ' M (bis 40kg)';
          break;
        default:
          echo ' L (über 40kg)';
          break;
      }
      echo '.</p>';
 
      $note = "nicht bewertet";
      switch($note) {
        case 1: case 2: case 3: case 4:
          echo '<p class="good">Bestanden</p>';
          break;
        case 5: case 6:
          echo '<p class="bad">Nicht bestanden</p>';
          break;
        case 'nicht bewertet':
          echo '<p class="ok">Nicht bewertet werden können</p>';
          break;
        default:
          echo '<p class="bad">Ungültige Note, nicht auswertbar</p>';
          break;
      }
    ?>
 
    <h2>Match</h2>
    <?php
     
     $farbe = 'gelb';

     $ergebnis = match ($farbe) {
        'gruen' => 'o gewinnt',
        'rot' => 'rote Zahlen gewinnen',
        'schwarz' => 'schwarze Zahlen gewinnen',
        default => 'keine korerekter Wert'
     };

     echo "<p>Die Farbe ist $farbe</p>";
     echo "<p><code>match()</code> gibt zurück: $ergebnis</p>";
     
    ?>

    
  </main>
</body>
</html>