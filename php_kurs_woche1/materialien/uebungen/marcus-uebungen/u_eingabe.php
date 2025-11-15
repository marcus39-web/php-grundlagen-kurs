<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Formulardaten auslesen und sichern
$vorname = htmlspecialchars($_POST['vorname'] ?? '');
$nachname = htmlspecialchars($_POST['nachname'] ?? '');
$strasse = htmlspecialchars($_POST['strasse'] ?? '');
$plz = htmlspecialchars($_POST['plz'] ?? '');
$ort = htmlspecialchars($_POST['ort'] ?? '');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auswertung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .address {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .address p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h2>Ihre Adresse lautet:</h2>
    
    <div class="address">
        <p><?= $vorname ?> <?= $nachname ?></p>
        <p><?= $strasse ?></p>
        <p><?= $plz ?> <?= $ort ?></p>
    </div>
    
    <p><a href="u_eingabe.html">Zurück zum Formular</a></p>
</body>
</html>
