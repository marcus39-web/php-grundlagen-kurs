<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pralinen - Bestellformular</title>
  <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Bestellformular für Pralinen</h1>
  </header>
  <main class="container">
    <p>Hallo gib bitte die gewünschte Menge Pralinen ein:</p>

    <form action="warenkorb.php" method="post">
      <table>
        <tr>
          <th>Art.-Nr.</th>
          <th>Artikel</th>
          <th>Menge</th>
          <th>Einheit</th>
        </tr>

        <?php
          
        /**
         * Schleife über das Array der Kategorie Pralinen
         * gibt pro Artikel eine Tabellenzelle mit
         * - der Artikelnummer
         * - der Artikelbezeichnung
         * - einem Formularfeld für die Angabe der Bestellmenge und
         * - die Angabe der Maßeinheit aus
         * 
         * Das Formularfeld bekommt das name-Attribut mit der Artikelnummer ($artnr) und das value-Attribut mit der bereits bestellten Menge bzw. dem Wert 0. Die bereits bestellte Menge wird aus dem Session-Array ausgelesen.
         * */
          
        foreach( $array_pralinen as $artnr => $artikel ):
        ?>

          <tr>
            <td><?= $artnr ?></td>
            <td><?= $artikel ?></td>
            <td><input type="number" name="<?= $artnr ?>" value="<?= $_SESSION[$artnr] ?? 0 ?>" size="5"></td>
            <td>Packung (150g)</td>
          </tr>

        <?php endforeach ?>

        <tr>
          <td colspan="4">
            <button style="margin-bottom:1rem;" type="submit">In den Warenkorb</button>
            <button type="reset">Abbrechen</button>
          </td>
        </tr>

      </table>
    </form>
  </main>
</body>
</html>