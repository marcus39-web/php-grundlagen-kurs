<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Übung 4 - while-Schleifen</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .gewinner {
            color: green;
            font-weight: bold;
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1>Übung 4 - Würfelspiel (while-Schleife)</h1>

    <?php
    // Initialisierung
    $spieler1 = 0;
    $spieler2 = 0;
    $runde = 0;
    $ziel = 25;
    
    // Arrays für die Tabelle
    $wuerfe_spieler1 = [];
    $wuerfe_spieler2 = [];
    
    // Spielschleife
    while ($spieler1 < $ziel && $spieler2 < $ziel) {
        $runde++;
        
        // Würfel für Spieler 1
        $wurf1 = rand(1, 6);
        $spieler1 += $wurf1;
        $wuerfe_spieler1[] = $wurf1;
        
        // Würfel für Spieler 2
        $wurf2 = rand(1, 6);
        $spieler2 += $wurf2;
        $wuerfe_spieler2[] = $wurf2;
    }
    
    // Ausgabe der Tabelle
    echo "<table>";
    echo "<tr><th>Spieler 1</th><th>Spieler 2</th></tr>";
    
    for ($i = 0; $i < $runde; $i++) {
        echo "<tr>";
        echo "<td>" . $wuerfe_spieler1[$i] . "</td>";
        echo "<td>" . $wuerfe_spieler2[$i] . "</td>";
        echo "</tr>";
    }
    
    // Gesamtpunktzahl
    echo "<tr>";
    echo "<td><strong>" . $spieler1 . "</strong></td>";
    echo "<td><strong>" . $spieler2 . "</strong></td>";
    echo "</tr>";
    echo "</table>";
    
    // Gewinner ermitteln
    if ($spieler1 > $spieler2) {
        echo "<p class='gewinner'>Spieler 1 hat gewonnen</p>";
    } else {
        echo "<p class='gewinner'>Spieler 2 hat gewonnen</p>";
    }
    ?>
    
</body>
</html>