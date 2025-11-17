<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

// Array mit Honigsorten und Preisen (gleich wie in u_formular.php)
$array_honig = [
  'H001' => ['name' => 'Akazienhonig', 'preis' => 8.50],
  'H002' => ['name' => 'Heidehonig', 'preis' => 9.00],
  'H003' => ['name' => 'Kleehonig', 'preis' => 7.50],
  'H004' => ['name' => 'Tannenhonig', 'preis' => 10.00],
];

// Formulardaten in Session speichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($array_honig as $artnr => $artikel) {
    if (isset($_POST[$artnr])) {
      $_SESSION[$artnr] = $_POST[$artnr];
    }
  }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honigbestellung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Honigbestellung</h1>
  </header>
  <main class="container">
    <div style="background-color: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; max-width: 500px;">
      <h2>Sie haben folgende Mengen bestellt:</h2>
      
      <table style="width: 100%;">
      <?php
      // Bestellte Mengen anzeigen
      $gesamtpreis = 0;
      foreach ($array_honig as $artnr => $daten) {
        $menge = $_SESSION[$artnr] ?? 0;
        if ($menge > 0) {
          $teilpreis = $menge * $daten['preis'];
          $gesamtpreis += $teilpreis;
          echo "<tr>";
          echo "<td>{$daten['name']}: $menge Gläser à " . number_format($daten['preis'], 2, ',', '.') . " €</td>";
          echo "<td style='text-align: right;'>" . number_format($teilpreis, 2, ',', '.') . " €</td>";
          echo "</tr>";
        }
      }
      if ($gesamtpreis > 0) {
        echo "<tr><td colspan='2'><hr></td></tr>";
        echo "<tr><td><strong>Gesamtpreis:</strong></td><td style='text-align: right;'><strong>" . number_format($gesamtpreis, 2, ',', '.') . " €</strong></td></tr>";
      }
      ?>
      </table>

      <hr>
      
      <p><em>Die Session-ID lautet: <?= session_id() ?></em></p>
      
      <p>
        <a href="u_abschluss.php">Weiter zur Eingabe persönlicher Daten und dem Abschluss der Bestellung</a>
      </p>
      
    </div>
  </main>
</body>
</html>