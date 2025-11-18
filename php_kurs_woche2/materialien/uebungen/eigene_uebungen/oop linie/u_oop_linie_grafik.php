<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "u_oop_linie.inc.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung OOP Linie - Grafische Darstellung</title>
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
        .linie {
            stroke: red;
            stroke-width: 0.15;
        }
    </style>
</head>
<body>
    <h1>Übung: OOP - Linie (Grafische Darstellung)</h1>
    
    <!-- Linie 1 -->
    <?php $linie1 = new Linie(); ?>
    <div class="info">
        <h2>Linie 1:</h2>
        <p><?php echo $linie1; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-5 -5 10 10" preserveAspectRatio="xMidYMid meet">
            <line x1="-5" y1="0" x2="5" y2="0" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <line x1="0" y1="-5" x2="0" y2="5" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <?php
            $anfang = $linie1->getAnfang();
            $ende = $linie1->getEnde();
            $x1 = $anfang->getX();
            $y1 = -$anfang->getY();
            $x2 = $ende->getX();
            $y2 = -$ende->getY();
            echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='linie'/>";
            echo "<circle cx='$x1' cy='$y1' r='0.2' class='punkt'/>";
            echo "<circle cx='$x2' cy='$y2' r='0.2' class='punkt'/>";
            echo "<text x='" . ($x1 + 0.3) . "' y='" . ($y1 - 0.3) . "' class='punkt-label'>(" . $anfang->getX() . "|" . $anfang->getY() . ")</text>";
            echo "<text x='" . ($x2 + 0.3) . "' y='" . ($y2 - 0.3) . "' class='punkt-label'>(" . $ende->getX() . "|" . $ende->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Linie 2 -->
    <?php 
    $punkt1 = new Punkt(3.5, 2.5);
    $linie2 = new Linie(new Punkt(1.5, 4), $punkt1);
    ?>
    <div class="info">
        <h2>Linie 2:</h2>
        <p><?php echo $linie2; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-1 -5 6 7" preserveAspectRatio="xMidYMid meet">
            <line x1="-1" y1="0" x2="5" y2="0" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <line x1="0" y1="-5" x2="0" y2="2" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <?php
            $anfang = $linie2->getAnfang();
            $ende = $linie2->getEnde();
            $x1 = $anfang->getX();
            $y1 = -$anfang->getY();
            $x2 = $ende->getX();
            $y2 = -$ende->getY();
            echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='linie'/>";
            echo "<circle cx='$x1' cy='$y1' r='0.15' class='punkt'/>";
            echo "<circle cx='$x2' cy='$y2' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x1 + 0.2) . "' y='" . ($y1 - 0.2) . "' class='punkt-label'>(" . $anfang->getX() . "|" . $anfang->getY() . ")</text>";
            echo "<text x='" . ($x2 + 0.2) . "' y='" . ($y2 - 0.2) . "' class='punkt-label'>(" . $ende->getX() . "|" . $ende->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Linie 3 -->
    <?php $linie3 = new Linie(new Punkt(-2, 5.5)); ?>
    <div class="info">
        <h2>Linie 3:</h2>
        <p><?php echo $linie3; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-3 -7 4 8" preserveAspectRatio="xMidYMid meet">
            <line x1="-3" y1="0" x2="1" y2="0" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <line x1="0" y1="-7" x2="0" y2="1" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <?php
            $anfang = $linie3->getAnfang();
            $ende = $linie3->getEnde();
            $x1 = $anfang->getX();
            $y1 = -$anfang->getY();
            $x2 = $ende->getX();
            $y2 = -$ende->getY();
            echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='linie'/>";
            echo "<circle cx='$x1' cy='$y1' r='0.15' class='punkt'/>";
            echo "<circle cx='$x2' cy='$y2' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x1 + 0.2) . "' y='" . ($y1 - 0.2) . "' class='punkt-label'>(" . $anfang->getX() . "|" . $anfang->getY() . ")</text>";
            echo "<text x='" . ($x2 + 0.2) . "' y='" . ($y2 + 0.3) . "' class='punkt-label'>(" . $ende->getX() . "|" . $ende->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Linie 4 (vor Verschiebung) -->
    <?php $linie4 = new Linie(ende: new Punkt(2.5, 1)); ?>
    <div class="info">
        <h2>Linie 4 (vor Verschiebung):</h2>
        <p><?php echo $linie4; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-1 -2 4 3" preserveAspectRatio="xMidYMid meet">
            <line x1="-1" y1="0" x2="3" y2="0" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <line x1="0" y1="-2" x2="0" y2="1" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <?php
            $anfang = $linie4->getAnfang();
            $ende = $linie4->getEnde();
            $x1 = $anfang->getX();
            $y1 = -$anfang->getY();
            $x2 = $ende->getX();
            $y2 = -$ende->getY();
            echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='linie'/>";
            echo "<circle cx='$x1' cy='$y1' r='0.1' class='punkt'/>";
            echo "<circle cx='$x2' cy='$y2' r='0.1' class='punkt'/>";
            echo "<text x='" . ($x1 + 0.15) . "' y='" . ($y1 + 0.25) . "' class='punkt-label'>(" . $anfang->getX() . "|" . $anfang->getY() . ")</text>";
            echo "<text x='" . ($x2 + 0.15) . "' y='" . ($y2 - 0.15) . "' class='punkt-label'>(" . $ende->getX() . "|" . $ende->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Linie 4 (nach Verschiebung) -->
    <?php $linie4->verschieben(-2, 1.5); ?>
    <div class="info">
        <h2>Linie 4 (nach Verschiebung um -2, 1.5):</h2>
        <p><?php echo $linie4; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-3 -3 4 4" preserveAspectRatio="xMidYMid meet">
            <line x1="-3" y1="0" x2="1" y2="0" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <line x1="0" y1="-3" x2="0" y2="1" stroke="gray" stroke-width="0.05" opacity="0.5"/>
            <?php
            $anfang = $linie4->getAnfang();
            $ende = $linie4->getEnde();
            $x1 = $anfang->getX();
            $y1 = -$anfang->getY();
            $x2 = $ende->getX();
            $y2 = -$ende->getY();
            echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='linie'/>";
            echo "<circle cx='$x1' cy='$y1' r='0.1' class='punkt'/>";
            echo "<circle cx='$x2' cy='$y2' r='0.1' class='punkt'/>";
            echo "<text x='" . ($x1 + 0.15) . "' y='" . ($y1 - 0.15) . "' class='punkt-label'>(" . $anfang->getX() . "|" . $anfang->getY() . ")</text>";
            echo "<text x='" . ($x2 + 0.15) . "' y='" . ($y2 - 0.15) . "' class='punkt-label'>(" . $ende->getX() . "|" . $ende->getY() . ")</text>";
            ?>
        </svg>
    </div>

</body>
</html>
