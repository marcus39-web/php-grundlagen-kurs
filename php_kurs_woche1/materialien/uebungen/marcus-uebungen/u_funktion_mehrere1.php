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

    // Testprogramm mit verschiedenen Aufrufen
    mittel(4, 7, 6);
    mittel(44, 67.5, 1);
    mittel(-5, 0, -13);
    mittel(0.001, 0.0081, 0.0032);
    mittel(5, 8, 2);
    ?>
</body>
</html>