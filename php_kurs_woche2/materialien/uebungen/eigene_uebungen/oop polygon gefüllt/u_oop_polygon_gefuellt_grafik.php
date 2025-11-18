<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "u_oop_polygon_gefuellt.inc.php";

$polygonGefuellt1 = new PolygonGefuellt(
    array(new Punkt(3.5, 2.5),
          new Punkt(-2, 6.5),
          new Punkt(1.5, -3.5)),
    "Rot"
);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung OOP Polygon gefüllt - Grafische Darstellung</title>
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
            fill: black;
        }
        .punkt-label {
            font-size: 12px;
            fill: black;
        }
    </style>
</head>
<body>
    <h1>Übung: OOP - Gefülltes Polygon (Grafische Darstellung)</h1>
    
    <div class="info">
        <h2>Polygon 1 (Original):</h2>
        <p><?php echo $polygonGefuellt1; ?></p>
    </div>

    <div class="canvas-container">
        <svg width="600" height="400" viewBox="-10 -10 20 20" preserveAspectRatio="xMidYMid meet">
            <!-- Koordinatensystem -->
            <line x1="-10" y1="0" x2="10" y2="0" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            <line x1="0" y1="-10" x2="0" y2="10" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            
            <!-- Polygon gefüllt -->
            <?php
            $punkte = $polygonGefuellt1->getPunkte();
            if (!empty($punkte)) {
                // SVG Polygon Punkte erstellen
                $svgPoints = "";
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY(); // Y-Achse umkehren für SVG
                    $svgPoints .= "$x,$y ";
                }
                
                // Farbe konvertieren
                $farbe = strtolower($polygonGefuellt1->getFarbe());
                $colorMap = [
                    'rot' => 'red',
                    'blau' => 'blue',
                    'grün' => 'green',
                    'gelb' => 'yellow',
                    'keine farbe' => 'lightgray'
                ];
                $svgColor = $colorMap[$farbe] ?? 'lightgray';
                
                echo "<polygon points='$svgPoints' fill='$svgColor' fill-opacity='0.5' stroke='black' stroke-width='0.2'/>";
                
                // Punkte und Labels zeichnen
                foreach ($punkte as $index => $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    echo "<circle cx='$x' cy='$y' r='0.3' class='punkt'/>";
                    echo "<text x='" . ($x + 0.5) . "' y='" . ($y - 0.5) . "' class='punkt-label'>($x|" . $punkt->getY() . ")</text>";
                }
            }
            ?>
        </svg>
    </div>

    <div class="info">
        <h2>Polygon 1 (nach Verschiebung um 0.5, 3.5):</h2>
        <?php 
        $polygonGefuellt1->verschieben(0.5, 3.5);
        echo "<p>$polygonGefuellt1</p>";
        ?>
    </div>

    <div class="canvas-container">
        <svg width="600" height="400" viewBox="-3 -12 8 14" preserveAspectRatio="xMidYMid meet">
            <!-- Koordinatensystem -->
            <line x1="-3" y1="0" x2="5" y2="0" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            <line x1="0" y1="-12" x2="0" y2="2" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            
            <!-- Polygon gefüllt nach Verschiebung -->
            <?php
            $punkte = $polygonGefuellt1->getPunkte();
            if (!empty($punkte)) {
                $svgPoints = "";
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    $svgPoints .= "$x,$y ";
                }
                
                // Farbe konvertieren
                $farbe = strtolower($polygonGefuellt1->getFarbe());
                $colorMap = [
                    'rot' => 'red',
                    'blau' => 'blue',
                    'grün' => 'green',
                    'gelb' => 'yellow',
                    'keine farbe' => 'lightgray'
                ];
                $svgColor = $colorMap[$farbe] ?? 'lightgray';
                
                echo "<polygon points='$svgPoints' fill='$svgColor' fill-opacity='0.5' stroke='black' stroke-width='0.2'/>";
                
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    echo "<circle cx='$x' cy='$y' r='0.3' class='punkt'/>";
                    echo "<text x='" . ($x + 0.5) . "' y='" . ($y - 0.5) . "' class='punkt-label'>($x|" . $punkt->getY() . ")</text>";
                }
            }
            ?>
        </svg>
    </div>

    <div class="info">
        <h2>Polygon 1 (nach Färbung in Blau):</h2>
        <?php 
        $polygonGefuellt1->faerben("Blau");
        echo "<p>$polygonGefuellt1</p>";
        ?>
    </div>

    <div class="canvas-container">
        <svg width="600" height="400" viewBox="-3 -12 8 14" preserveAspectRatio="xMidYMid meet">
            <!-- Koordinatensystem -->
            <line x1="-3" y1="0" x2="5" y2="0" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            <line x1="0" y1="-12" x2="0" y2="2" stroke="gray" stroke-width="0.1" opacity="0.5"/>
            
            <!-- Polygon gefüllt nach Färbung -->
            <?php
            $punkte = $polygonGefuellt1->getPunkte();
            if (!empty($punkte)) {
                $svgPoints = "";
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    $svgPoints .= "$x,$y ";
                }
                
                // Farbe konvertieren
                $farbe = strtolower($polygonGefuellt1->getFarbe());
                $colorMap = [
                    'rot' => 'red',
                    'blau' => 'blue',
                    'grün' => 'green',
                    'gelb' => 'yellow',
                    'keine farbe' => 'lightgray'
                ];
                $svgColor = $colorMap[$farbe] ?? 'lightgray';
                
                echo "<polygon points='$svgPoints' fill='$svgColor' fill-opacity='0.5' stroke='black' stroke-width='0.2'/>";
                
                foreach ($punkte as $punkt) {
                    $x = $punkt->getX();
                    $y = -$punkt->getY();
                    echo "<circle cx='$x' cy='$y' r='0.3' class='punkt'/>";
                    echo "<text x='" . ($x + 0.5) . "' y='" . ($y - 0.5) . "' class='punkt-label'>($x|" . $punkt->getY() . ")</text>";
                }
            }
            ?>
        </svg>
    </div>

</body>
</html>
