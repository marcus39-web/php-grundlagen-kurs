<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Funktion mit Parameter</title>
</head>
<body>
    <?php
    // Funktion quadrat() - berechnet und gibt das Quadrat einer Zahl aus
    function quadrat($zahl) {
        $ergebnis = $zahl * $zahl;
        echo "Das Quadrat von $zahl ist $ergebnis<br>";
    }

    // Testprogramm mit verschiedenen Zahlen
    quadrat(3);
    quadrat(3.2);
    quadrat(-5);
    quadrat(83373);
    ?>
</body>
</html>