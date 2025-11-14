<?php
$bezeichnung_tisch = 'Schreibtisch';
$bezeichnung_stuhl = 'Bürostuhl';
$bezeichnung_lampe = 'Lampe';
$bezeichnung_pctisch = 'Computertisch';

$preis_tisch = 1999;
$preis_stuhl = 589;
$preis_lampe = 29;
$preis_pctisch = 999;

const MWST = 0.19;
const EURO = ' Euro';

$netto_gesamt = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;
$brutto_gesamt = $netto_gesamt * (1 + MWST);
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Büro (Übung K3-2)</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header>
    <h1>K3 Übung 2, Büro</h1>
  </header>
  <main class="container">
    <p>Netto-Gesamtpreis der eingekauften Artikel: <?= $netto_gesamt ?></p>
    <p>Brutto-Gesamtpreis der eingekauften Artikel: <?= $brutto_gesamt ?></p>
    <hr>
    <p>Brutto-Preis <b><?= $bezeichnung_tisch ?></b>: <?= $preis_tisch * (1 + MWST), EURO ?></p>
    <p>Brutto-Preis <b><?= $bezeichnung_stuhl ?></b>: <?= $preis_stuhl * (1 + MWST), EURO ?></p>
    <p>Brutto-Preis <b><?= $bezeichnung_lampe ?></b>: <?= $preis_lampe * (1 + MWST), EURO ?></p>
    <p>Brutto-Preis <b><?= $bezeichnung_pctisch ?></b>: <?= $preis_pctisch * (1 + MWST), EURO ?></p>
  </main>
</body>
</html>