<?php
declare(strict_types=1);
$name = "Marcus";
$age = 55;
$lucky = 7;
$sum = $age + $lucky;

/* 
Arithmetischen-Operatoren
+ Addition
- Subtraktion
* Multiplikation
/ Division
% Modulo (Rest einer Division)

Verkettungs-Operator (Konkatenator)
.

Vergleichs-Operatoren
< kleiner als
> größer als
<= kleiner gleich
>= größer gleich
== gleich
=== identisch
!= ungleich
!== nicht identisch
*/

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Variablen & Operatoren</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Variablen & Operatoren</h1></header>
  <main class="container">
    <p>Hallo <?= htmlspecialchars($name);?>, du bist <?= $age; ?> Jahre alt.</p>
    <p>Deine Glückszahl ist <?= $lucky; ?>.</p>
    <p>Summe: <?= $sum; ?></p>
  </main>
</body>
</html>
