<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "u_oop_polygon.inc.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung OOP Polygon - Grafische Darstellung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .info {
            margin: 20px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        .canvas-container {
            margin: 20px 0;
            border: 2px solid #333;
            display: inline-block;
        }
        svg {
            background-color: white;
        }
        .punkt {
            fill: blue;
        }
        .punkt-label {
            font-size: 12px;
            fill: black;
        }
        .polygon {
            fill: lightblue;
            fill-opacity: 0.3;
            stroke: darkblue;
            stroke-width: 0.15;
        }
        .achse {
            stroke: gray;
            stroke-width: 0.05;
            opacity: 0.5;
        }
        .gitter {
            stroke: lightgray;
            stroke-width: 0.02;
            opacity: 0.3;
        }
    </style>
</head>
<body>
    <h1>Übung: OOP - Polygon (Grafische Darstellung)</h1>
    
    <!-- Polygon 1 (leer) -->
    <?php $polygon1 = new Polygon(); ?>
    <div class="info">
        <h2>Polygon 1 (leeres Polygon):</h2>
        <p><?php echo $polygon1; ?></p>
        <p><em>Keine Punkte vorhanden - keine grafische Darstellung möglich</em></p>
    </div>

    <!-- Polygon 2 (vor Verschiebung) -->
    <?php 
    $punkt1 = new Punkt(3.5, 2.5);
    $punkt2 = new Punkt(-2, 8.5);
    $polygon2 = new Polygon(array($punkt1, new Punkt(3), $punkt2));
    ?>
    <div class="info">
        <h2>Polygon 2 (vor Verschiebung):</h2>
        <p><?php echo $polygon2; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="500" height="500" viewBox="-4 -10 9 12" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -4; $i <= 5; $i++): ?>
                <line x1="<?=$i?>" y1="-10" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -10; $i <= 2; $i++): ?>
                <line x1="-4" y1="<?=$i?>" x2="5" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-4" y1="0" x2="5" y2="0" class="achse"/>
            <line x1="0" y1="-10" x2="0" y2="2" class="achse"/>
            
            <!-- Polygon -->
            <?php
            $punkte = $polygon2->getPunkte();
            if (!empty($punkte)) {
                // SVG Polygon Punkte erstellen
                $svgPoints = "";
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    $svgPoints .= "$x,$y ";
                }
                echo "<polygon points='$svgPoints' class='polygon'/>";
                
                // Punkte und Labels zeichnen
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    echo "<circle cx='$x' cy='$y' r='0.2' class='punkt'/>";
                    echo "<text x='" . ($x + 0.3) . "' y='" . ($y - 0.3) . "' class='punkt-label'>($x|" . $punkt->getY() . ")</text>";
                }
            }
            ?>
        </svg>
    </div>

    <!-- Polygon 2 (nach Verschiebung) -->
    <?php $polygon2->verschieben(1, 2.5); ?>
    <div class="info">
        <h2>Polygon 2 (nach Verschiebung um 1, 2.5):</h2>
        <p><?php echo $polygon2; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="500" height="500" viewBox="-3 -12 9 14" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -3; $i <= 6; $i++): ?>
                <line x1="<?=$i?>" y1="-12" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -12; $i <= 2; $i++): ?>
                <line x1="-3" y1="<?=$i?>" x2="6" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-3" y1="0" x2="6" y2="0" class="achse"/>
            <line x1="0" y1="-12" x2="0" y2="2" class="achse"/>
            
            <!-- Polygon -->
            <?php
            $punkte = $polygon2->getPunkte();
            if (!empty($punkte)) {
                $svgPoints = "";
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    $svgPoints .= "$x,$y ";
                }
                echo "<polygon points='$svgPoints' class='polygon'/>";
                
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    echo "<circle cx='$x' cy='$y' r='0.2' class='punkt'/>";
                    echo "<text x='" . ($x + 0.3) . "' y='" . ($y - 0.3) . "' class='punkt-label'>($x|" . $punkt->getY() . ")</text>";
                }
            }
            ?>
        </svg>
    </div>

</body>
</html>
