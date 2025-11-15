<?php
$bezeichnung_tisch = "Schreibtisch";
$bezeichnung_stuhl = "Bürostuhl";
$bezeichnung_lampe = "Lampe";
$bezeichnung_pctisch = "Computertisch";
$preis_tisch = 1999.00;
$preis_stuhl = 598.00;
$preis_lampe = 29.00;
$preis_pctisch = 999.00;

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Büro</title>


</head>
<body>
  <header><h1>Mit Variablen, Operatoren und Konstanten arbeiten</h1></header>
  <main class="container">
    <?php
    // Konstanten definieren
    define('MWST', 0.19);
    define('EURO', ' Euro.');

    // Gesamtpreis berechnen
    $gesamt_netto = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;

    // Bruttopreis berechnen
    $brutto_gesamt = $gesamt_netto * (1 + MWST);
    
    // Bruttopreise für einzelne Artikel
    $brutto_tisch = $preis_tisch * (1 + MWST);
    $brutto_stuhl = $preis_stuhl * (1 + MWST);
    $brutto_lampe = $preis_lampe * (1 + MWST);
    $brutto_pctisch = $preis_pctisch * (1 + MWST);
    
    // Ausgabe
    echo "<p>Netto-Gesamtpreis der eingekauften Artikel: " . number_format($gesamt_netto, 0, ',', '') . EURO . "</p>";
    echo "<p>Brutto-Gesamtpreis der eingekauften Artikel: " . number_format($brutto_gesamt, 2, '.', '') . EURO . "</p>";
    echo "<hr>";
    echo "<p>Brutto-Preis <strong>" . $bezeichnung_tisch . "</strong>. " . number_format($brutto_tisch, 2, '.', '') . EURO . "</p>";
    echo "<p>Brutto-Preis <strong>" . $bezeichnung_stuhl . "</strong>. " . number_format($brutto_stuhl, 2, '.', '') . EURO . "</p>";
    echo "<p>Brutto-Preis <strong>" . $bezeichnung_lampe . "</strong>. " . number_format($brutto_lampe, 2, '.', '') . EURO . "</p>";
    echo "<p>Brutto-Preis <strong>" . $bezeichnung_pctisch . "</strong>. " . number_format($brutto_pctisch, 2, '.', '') . EURO . "</p>";
    ?>
  </main>
</body>
</html>