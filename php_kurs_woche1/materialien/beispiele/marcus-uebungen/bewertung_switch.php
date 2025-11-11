<?php
declare(strict_types=1);

// Punkte für die Bewertung
$punkte = 10;
$bewertung = "";

// Switch-Anweisung zur Bewertung
switch(true) {
    case ($punkte >= 10):
        $bewertung = "Sehr gut";
        break;
    case ($punkte >= 9):
        $bewertung = "Gut";
        break;
    case ($punkte >= 7):
        $bewertung = "Befriedigend";
        break;
    case ($punkte >= 5):
        $bewertung = "Ausreichend";
        break;
    default:
        $bewertung = "Weniger als 5 Punkte erreicht";
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">

</head>
<body>
    <header><h1>bewertung_switch-2.php</h1></header>
    <main class="container">
        
        <ul>
            <li><strong>10 Punkte:</strong> Sehr gut</li>
            <li><strong>9 Punkte:</strong> Gut</li>
            <li><strong>7 Punkte:</strong> Befriedigend</li>
            <li><strong>5 Punkte:</strong> Ausreichend</li>
            <li><strong>Weniger als 5 Punkte:</strong> <em>Weniger als 5 Punkte erreicht</em></li>
        </ul>
        
        <hr>
        
        <h3>Ergebnis:</h3>
        <p><strong>Erreichte Punkte:</strong> <?= $punkte ?></p>
        <p><strong>Bewertung:</strong> <span class="<?= $punkte >= 7 ? 'good' : ($punkte >= 5 ? 'ok' : 'bad') ?>"><?= $bewertung ?></span></p>
    </main>
</body>
</html>