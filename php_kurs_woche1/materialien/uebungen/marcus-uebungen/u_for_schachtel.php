<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Übung 2 - for-Schachtel</title>
</head>
<body>
    <h1>Verschachtelte for-Schleifen</h1>

    <?php
    // Verschachtelte for-Schleifen für das kleine Einmaleins
    for ($zeile = 1; $zeile <= 10; $zeile++) {
        for ($spalte = 1; $spalte <= 10; $spalte++) {
            $ergebnis = $zeile * $spalte;
            echo $ergebnis . " ";
        }
        echo "<br>";
    }
    ?>
    
</body>
</html>