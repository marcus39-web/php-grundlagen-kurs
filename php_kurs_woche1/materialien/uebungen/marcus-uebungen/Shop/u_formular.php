<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

// Array mit Honigsorten und Preisen
$array_honig = [
  'H001' => ['name' => 'Akazienhonig', 'preis' => 8.50],
  'H002' => ['name' => 'Heidehonig', 'preis' => 9.00],
  'H003' => ['name' => 'Kleehonig', 'preis' => 7.50],
  'H004' => ['name' => 'Tannenhonig', 'preis' => 10.00],
];
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Honig - Bestellformular</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Honigbestellung</h1>
  </header>
  <main class="container">
    <div style="background-color: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; max-width: 400px;">
      <p>Bitte geben Sie die Bestellmenge an (Einheit: 500 g Glas)</p>

      <form action="u_bestellungen.php" method="post">
        <table>
          <tr>
            <th>Honig</th>
            <th style="text-align: right;">Preis</th>
            <th>Menge</th>
          </tr>

          <?php
          foreach( $array_honig as $artnr => $daten ):
          ?>

            <tr>
              <td><?= $daten['name'] ?></td>
              <td style="text-align: right;"><?= number_format($daten['preis'], 2, ',', '.') ?> €</td>
              <td><input type="text" name="<?= $artnr ?>" value="<?= $_SESSION[$artnr] ?? '' ?>" size="5"></td>
            </tr>

          <?php endforeach ?>

          <tr>
            <td colspan="2">
              <button style="margin-bottom:1rem;" type="submit">Absenden</button>
            </td>
          </tr>

        </table>
      </form>
    </div>
  </main>
</body>
</html>