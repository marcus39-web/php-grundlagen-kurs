<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css"> 
    <title>Uebung 1 for Schleifen</title>
</head>
<body>
    <h1>Übung 1 - for-Schleifen</h1>

    <?php

    for ($i = 13; $i <= 29; $i += 4) {
        echo $i . " ";
    }
    echo "<br>";

    for ($i = 2; $i >= -1; $i -= 0.5) {
        echo $i . " ";
    }
    echo "<br>";

    for ($i = 2000; $i <= 6000; $i += 1000) {
        echo $i . " ";
    }
    echo "<br>";

    for ($i = 5; $i <= 13; $i += 2) {
        echo "Z" . $i . " ";
    }
    echo "<br>";

    for ($i = 1; $i <= 3; $i++) {
        echo "a b" . $i . " ";
    }
    echo "<br>";

    for ($i = 2; $i <= 22; $i += 10) {
        echo "c" . $i . " ";
        echo "c" . ($i + 1) . " ";
    }
    echo "<br>";

    // Siebte for-Schleife mit Verzweigung: 13 17 21 33 37 41 45 (reine Zahlenreihe)
    for ($i = 13; $i <= 45; $i += 4) {
        // Überspringe die Zahlen 25 und 29
        if ($i == 25 || $i == 29) {
            continue;
        }
        echo $i . " ";
    }
    ?>
    
</body>
</html>