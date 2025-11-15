<?php
declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Bewertung mit Switch und for-Schleife</title>
</head>
<body>
    <header><h1>bewertung_switch-2.php</h1></header>
    <main class="container">
        
        
        <?php
        // For-Schleife von 10 bis 0 Punkte
        for($punkte = 10; $punkte >= 0; $punkte--) {
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
                    $bewertung = "Leider zu wenige Punkte erreicht";
            }
            
            // Ausgabe für jeden Punktestand
            echo "<p><strong>$punkte Punkte ergeben folgende Bewertung:</strong> $bewertung</p>\n";
        }
        ?>
        
       
    </main>
</body>
</html>