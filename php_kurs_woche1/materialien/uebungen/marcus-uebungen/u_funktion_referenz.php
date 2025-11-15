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
    <title>Funktion Referenz x</title>
</head>
<body>
    <?php
    // Funktion rechne() - berechnet Summe und Produkt von zwei Zahlen
    // Die Ergebnisse werden über die Parameterliste zurückgegeben (call-by-reference)
    function rechne($a, $b, &$summe, &$produkt) {
        $summe = $a + $b;
        $produkt = $a * $b;
    }

    // Testprogramm - Aufruf mit verschiedenen Zahlen
    
    $zahl1 = 7;
    $zahl2 = 5;
    $s1 = 0;  // Variable für Summe
    $p1 = 0;  // Variable für Produkt
    
    rechne($zahl1, $zahl2, $s1, $p1);
    
    echo "Die Summe von $zahl1 und $zahl2 ist $s1<br>";
    echo "Das Produkt von $zahl1 und $zahl2 ist $p1<br><br>";


    ?>
</body>
</html>