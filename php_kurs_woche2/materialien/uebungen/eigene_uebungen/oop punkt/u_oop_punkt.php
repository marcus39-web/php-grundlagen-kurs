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
    <title>Übung OOP Punkt</title>
</head>
<body>
    <h1>Übung: OOP - Punkt</h1>
   
<?php 
$punkt1 = new Punkt();
echo "$punkt1<br>";
$punkt2 = new Punkt(3.5, 2.5);
echo "$punkt2<br>";
$punkt3 = new Punkt(4);
echo "$punkt3<br>";
$punkt4 = new Punkt(y: 1.5);
echo "$punkt4<br>";
$punkt4->verschieben(4.5, 2);
echo "$punkt4";
 ?>

</html>