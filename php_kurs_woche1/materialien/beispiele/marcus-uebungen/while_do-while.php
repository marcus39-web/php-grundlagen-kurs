<?php
$zahl = 1;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>while- und do-while-Schleife</title>
</head>
<body>
    <header><h1>while- und do-while-Schleife</h1></header>
    <main class="container">
        
        
        <h3>while-Schleife: (Startwert: 1)</h3>
        <?php
        $zahl = 1;
        while($zahl <= 5) {
            echo "<p>$zahl</p>";
            $zahl++;
        }
        ?>
        
        <hr>
        
        <h3>do-while-Schleife: (Startwert: 2)</h3>
        <?php
        $zahl = 1;
        do {
            echo "<p>$zahl</p>";
            $zahl++;
        } while($zahl <= 5);
        ?>
        

    </main>
</body>
</html>