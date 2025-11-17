<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

// Array mit Honigsorten und Preisen (gleich wie in anderen Dateien)
$array_honig = [
  'H001' => ['name' => 'Akazienhonig', 'preis' => 8.50],
  'H002' => ['name' => 'Heidehonig', 'preis' => 9.00],
  'H003' => ['name' => 'Kleehonig', 'preis' => 7.50],
  'H004' => ['name' => 'Tannenhonig', 'preis' => 10.00],
];

// Kontaktdaten in Session speichern wenn Formular abgeschickt wurde
$showForm = true;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nachname'])) {
  $_SESSION['nachname'] = $_POST['nachname'] ?? '';
  $_SESSION['wohnort'] = $_POST['wohnort'] ?? '';
  $_SESSION['email'] = $_POST['email'] ?? '';
  $showForm = false;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honigbestellung - Abschluss</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Honigbestellung - Abschluss</h1>
  </header>
  <main class="container">
    <div style="background-color: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; max-width: 500px;">
      
      <?php if ($showForm): ?>
        <!-- Formular für Kontaktdaten -->
        <p>Bitte geben Sie noch Ihre Kontaktdaten ein:</p>
        
        <form action="u_abschluss.php" method="post">
          <table>
            <tr>
              <td><label for="nachname">Nachname:</label></td>
              <td><input type="text" name="nachname" id="nachname" required></td>
            </tr>
            <tr>
              <td><label for="wohnort">Wohnort:</label></td>
              <td><input type="text" name="wohnort" id="wohnort" required></td>
            </tr>
            <tr>
              <td><label for="email">Mailadresse:</label></td>
              <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
              <td colspan="2">
                <button style="margin-bottom:1rem;" type="submit">Absenden</button>
              </td>
            </tr>
          </table>
        </form>
        
      <?php else: ?>
        <!-- Bestellübersicht mit Kontaktdaten -->
        <h2>Vielen Dank für Ihre Bestellung!</h2>
        
        <h3>Ihre Kontaktdaten:</h3>
        <p><strong>Nachname:</strong> <?= htmlspecialchars($_SESSION['nachname']) ?></p>
        <p><strong>Wohnort:</strong> <?= htmlspecialchars($_SESSION['wohnort']) ?></p>
        <p><strong>E-Mail:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
        
        <hr>
        
        <h3>Ihre Bestellung:</h3>
        <table style="width: 100%;">
        <?php
        $gesamt = 0;
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
            $gesamt += $menge;
          }
        }
        ?>
        <tr><td colspan="2"><hr></td></tr>
        <tr><td><strong>Gesamt: <?= $gesamt ?> Gläser</strong></td><td></td></tr>
        <tr><td><strong>Gesamtpreis:</strong></td><td style="text-align: right;"><strong><?= number_format($gesamtpreis, 2, ',', '.') ?> €</strong></td></tr>
        </table>
        
        <hr>
        
     
        
        <p>Damit ist die Session beendet. <a href="u_formular.php">Klicken Sie hier</a> um eine neue Bestellung zu beginnen.</p>
        
      <?php endif; ?>
      
    </div>
  </main>
</body>
</html>