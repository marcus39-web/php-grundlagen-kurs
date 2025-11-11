<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen Fortsetzung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <?php
        
        $einString = 'Ich bin eine Variable'; //Daten vom Typ String

        echo "<p>Der Inhalt der Variablen ist: $ein String.</p>";

        echo '<p>Der Inhalt der Variablen ist: ' . $einString . '.</p>';
        
        echo "<p>Der Inhalt aus dem Double-Quotes ist: $einString.</p>\r\n";

        echo '<p>Eine mit Komma getrennte Ausgabe mit mehreren Zeichenketten:', $einString, 'ist aus einer Variablen.', '</p>';

        /* ? == Verketten und Rechnen
        ======================================================================================================= */

        $zahl = 5;
        $andereZahl = 37;

        echo "die Summe der Zahlen $zahl und $andereZahl ergibt: " . ($zahl + $andereZahl) . "</p>";

        $preisZiege = '0.5 Kamele';
        $menge = 5;

        $prod = $preisZiege * $menge;

        echo "<p>Eine Ziege kostet $preisZiege</p>";
        echo "<p>Für $menge Ziegen bekommt man $prod Kamele.</p>";
    ?>
</body>
</html>