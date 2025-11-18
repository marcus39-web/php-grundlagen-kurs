<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "u_oop_punkt.inc.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung OOP Punkt - Grafische Darstellung</title>
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
            fill: red;
        }
        .punkt-label {
            font-size: 14px;
            fill: black;
            font-weight: bold;
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
    <h1>Übung: OOP - Punkt (Grafische Darstellung)</h1>
    
    <!-- Punkt 1 -->
    <?php $punkt1 = new Punkt(); ?>
    <div class="info">
        <h2>Punkt 1:</h2>
        <p><?php echo $punkt1; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-3 -3 6 6" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -3; $i <= 3; $i++): ?>
                <line x1="<?=$i?>" y1="-3" x2="<?=$i?>" y2="3" class="gitter"/>
                <line x1="-3" y1="<?=$i?>" x2="3" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-3" y1="0" x2="3" y2="0" class="achse"/>
            <line x1="0" y1="-3" x2="0" y2="3" class="achse"/>
            <!-- Punkt -->
            <?php
            $x = $punkt1->getX();
            $y = -$punkt1->getY();
            echo "<circle cx='$x' cy='$y' r='0.2' class='punkt'/>";
            echo "<text x='" . ($x + 0.3) . "' y='" . ($y - 0.3) . "' class='punkt-label'>($x|" . $punkt1->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Punkt 2 -->
    <?php $punkt2 = new Punkt(3.5, 2.5); ?>
    <div class="info">
        <h2>Punkt 2:</h2>
        <p><?php echo $punkt2; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-1 -4 6 6" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -1; $i <= 5; $i++): ?>
                <line x1="<?=$i?>" y1="-4" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -4; $i <= 2; $i++): ?>
                <line x1="-1" y1="<?=$i?>" x2="5" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-1" y1="0" x2="5" y2="0" class="achse"/>
            <line x1="0" y1="-4" x2="0" y2="2" class="achse"/>
            <!-- Punkt -->
            <?php
            $x = $punkt2->getX();
            $y = -$punkt2->getY();
            echo "<circle cx='$x' cy='$y' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x + 0.2) . "' y='" . ($y - 0.2) . "' class='punkt-label'>($x|" . $punkt2->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Punkt 3 -->
    <?php $punkt3 = new Punkt(4); ?>
    <div class="info">
        <h2>Punkt 3:</h2>
        <p><?php echo $punkt3; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-1 -2 6 4" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -1; $i <= 5; $i++): ?>
                <line x1="<?=$i?>" y1="-2" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -2; $i <= 2; $i++): ?>
                <line x1="-1" y1="<?=$i?>" x2="5" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-1" y1="0" x2="5" y2="0" class="achse"/>
            <line x1="0" y1="-2" x2="0" y2="2" class="achse"/>
            <!-- Punkt -->
            <?php
            $x = $punkt3->getX();
            $y = -$punkt3->getY();
            echo "<circle cx='$x' cy='$y' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x + 0.2) . "' y='" . ($y + 0.4) . "' class='punkt-label'>($x|" . $punkt3->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Punkt 4 (vor Verschiebung) -->
    <?php $punkt4 = new Punkt(y: 1.5); ?>
    <div class="info">
        <h2>Punkt 4 (vor Verschiebung):</h2>
        <p><?php echo $punkt4; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-2 -3 4 5" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -2; $i <= 2; $i++): ?>
                <line x1="<?=$i?>" y1="-3" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -3; $i <= 2; $i++): ?>
                <line x1="-2" y1="<?=$i?>" x2="2" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-2" y1="0" x2="2" y2="0" class="achse"/>
            <line x1="0" y1="-3" x2="0" y2="2" class="achse"/>
            <!-- Punkt -->
            <?php
            $x = $punkt4->getX();
            $y = -$punkt4->getY();
            echo "<circle cx='$x' cy='$y' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x + 0.2) . "' y='" . ($y - 0.2) . "' class='punkt-label'>($x|" . $punkt4->getY() . ")</text>";
            ?>
        </svg>
    </div>

    <!-- Punkt 4 (nach Verschiebung) -->
    <?php $punkt4->verschieben(4.5, 2); ?>
    <div class="info">
        <h2>Punkt 4 (nach Verschiebung um 4.5, 2):</h2>
        <p><?php echo $punkt4; ?></p>
    </div>
    <div class="canvas-container">
        <svg width="400" height="400" viewBox="-1 -5 7 7" preserveAspectRatio="xMidYMid meet">
            <!-- Gitter -->
            <?php for($i = -1; $i <= 6; $i++): ?>
                <line x1="<?=$i?>" y1="-5" x2="<?=$i?>" y2="2" class="gitter"/>
            <?php endfor; ?>
            <?php for($i = -5; $i <= 2; $i++): ?>
                <line x1="-1" y1="<?=$i?>" x2="6" y2="<?=$i?>" class="gitter"/>
            <?php endfor; ?>
            <!-- Achsen -->
            <line x1="-1" y1="0" x2="6" y2="0" class="achse"/>
            <line x1="0" y1="-5" x2="0" y2="2" class="achse"/>
            <!-- Punkt -->
            <?php
            $x = $punkt4->getX();
            $y = -$punkt4->getY();
            echo "<circle cx='$x' cy='$y' r='0.15' class='punkt'/>";
            echo "<text x='" . ($x + 0.2) . "' y='" . ($y - 0.2) . "' class='punkt-label'>($x|" . $punkt4->getY() . ")</text>";
            ?>
        </svg>
    </div>

</body>
</html>
