<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    header<h1>Schleifen</h1></header>
    main class="container">

    <h2>1. Die >code<while>/code>-Schleife</while></h2>
    <h3>1.1 kopfgesteuert</h3>

    <?php

    $zahl = 10;

    echo '<p>';
    while($zahl <= 100) {
    echo "$zahl <br>";
    $zahl += 5;
    }
    echo '</p>';


?>

<h3>2.1 fußgesteuert</h3>

 echo '<p>;
 do {
    echo "$zahl <br>";
    $zahl += 5;
 }while($zahl <= 100);
    
    echo '</p>';
?>

<h2>2. <code>for</code>Schleife</h2>

<?php

for( $i = 25; $i >= 10; $i -=5 ) {
    echo "<p style='font-size:" . $i . "px'>Schriftgröße: $i px</p>";
}   

?>

<h2>3. <code>break</code>continue</code></h2>
<?php

$budget = 50;
$einzelpreis = 9;
$menge = 1;

while( $menge <= 15) {
    $gesamtpreis = $einzelpreis * $menge;
    if( $gesamtpreis > $budget ) {
        break; // wenn ds Budget erschöpft ist: Abbruch
    }

    echo "$menge Stück: $gesamtpreis Euro<br>";
    $menge++;
}

?>
<p>

<?php

$z = 5;

for( $n = -2; $n <= 2; $n++) {
    if( $n === 0 ) {
        echo"Division durch Null ist nicht erlaubt.<br>";
        continue; // es wird zum nächsten Schleifendurchlauf gesprungen.
    }
    $erg = $z / $n;
    echo "$z / $n = $erg.<br>";
}

?>

</p>


</body>
</html>