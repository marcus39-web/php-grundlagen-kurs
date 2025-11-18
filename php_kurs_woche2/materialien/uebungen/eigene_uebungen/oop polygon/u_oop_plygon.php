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
    <title>Übung OOP Polygon</title>
</head>
<body>
    <h1>Übung: OOP - Polygon</h1>
<?php  
$polygon1 = new Polygon();
echo "$polygon1<br>";
$punkt1 = new Punkt(3.5, 2.5);
$punkt2 = new Punkt(-2, 8.5);
$polygon2 = new Polygon(array($punkt1, new Punkt(3), $punkt2));
echo "$polygon2<br>";
$polygon2->verschieben(1, 2.5);
echo "$polygon2<br>";
?>

</body>
</html>