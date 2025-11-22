<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Funktionsdefinition
function hallo($name){
  // echo-Ausgaben in Funktionen möglichst vermeiden
  echo "<p>Hallo $name aus der Funktion</p>";
}

// Funktion mit Rückgabe
function summe($a, $b){
  $erg = $a + $b;
  return $erg;
}

// fixe Datentypen
function brutto(float $netto, float $mwst = 0.19): float {
return $netto * (1 + $mwst);
}
// variable Parameter
function ausgabe(string $name, int $alter): String{
  $params = func_get_args();
// Werte der übergebenen Parameter
echo '<pre>', var_dump($params), '</pre>';
// Anzahl der übergebenen Parameter
$num_params = func_num_args();

echo "<p>Dieser Funktion wurden $num_params Parameter übergeben.</p>";

$sex = func_get_arg(2);

  return "$name ist $alter Jahre alt und ist $sex.";
}

// variadische Parameter
// nutzen ein Array als ein Parameter-Definition
function zeigeZutaten(... $args) {
  $ret = '<ul>';

  foreach ($args as $zutat) {
    $ret .= "<li>$zutat</li>";
  }

  $ret .= '</ul>';
  
  return $ret;
}

function personInfo(string $name, string $vorname, int $alter){
  return "$vorname $name ist $alter Jahre alt.";
}

$person = ['Müller', 'Peter', 39];



?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Funktionen Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Funktionen</h1></header>
  <main class="container">
    <p>Netto: 100.00 € → Brutto: €</p>
  </main>
</body>
</html>
