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
    <title>Rückgabewert</title>
</head>
<body>
    <?php
    // Funktion bigger() - gibt die größere von zwei Zahlen zurück
    function bigger($a, $b) {
        if ($a > $b) {
            return $a;
        } else {
            return $b;
        }
    }

    // Testprogramm mit verschiedenen Aufrufen
    $c = bigger(3, 4);
    echo "Maximum: $c<br>";

    $c = bigger(10, 5);
    echo "Maximum: $c<br>";

    $c = bigger(-3, -7);
    echo "Maximum: $c<br>";

    $c = bigger(4.5, 4.49);
    echo "Maximum: $c<br>";
    ?>
</body>
</html>