<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Mehrere Parameter</title>
</head>
<body>
    <?php
    // Funktion mittel() - berechnet den Mittelwert von mehreren Zahlen
    function mittel($zahl1, $zahl2, $zahl3) {
        $mittelwert = ($zahl1 + $zahl2 + $zahl3) / 3;
        echo "Der Mittelwert von $zahl1, $zahl2 und $zahl3 ist $mittelwert<br>";
    }

    // Funktion vermerk() - gibt einen Programmierer-Vermerk aus
    function vermerk($vorname, $nachname, $abteilung) {
        $email = strtolower("$vorname.$nachname@$abteilung.phpdevel.de");
        echo "<div style='border: 1px solid black; padding: 10px; margin: 10px 0;'>";
        echo "Programmteil von $vorname $nachname, Abteilung $abteilung<br>";
        echo "E-Mail: $email";
        echo "</div>";
    }

    // Testprogramm für mittel()
    echo "<h3>Mittelwert-Berechnungen:</h3>";
    mittel(4, 7, 6);
    mittel(44, 67.5, 1);
    mittel(-5, 0, -13);
    mittel(0.001, 0.0081, 0.0032);
    mittel(5, 8, 2);

    // Testprogramm für vermerk()
    echo "<h3>Entwickler-Vermerke:</h3>";
    vermerk('Bodo', 'Berg', 'FE2');
    vermerk('Hans', 'Heim', 'SU3');
    ?>
</body>
</html>