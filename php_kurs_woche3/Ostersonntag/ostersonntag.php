<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="de">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ostersonntag, Auswertung</title>
   <style>
      table,
      td {
         border: 1px solid black;
      }
   </style>
</head>

<body>
   
   <?php
   include 'ostersonntag.inc.php'; // Bindet die Funktion ein

   echo "<div style='width:220px;margin-left:0;'>";
   echo "<h1>Ostersonntag</h1>";

   if (isset($_GET['jahr1']) && isset($_GET['jahr2']) && is_numeric($_GET['jahr1']) && is_numeric($_GET['jahr2'])) {
      $jahr1 = (int)$_GET['jahr1'];
      $jahr2 = (int)$_GET['jahr2'];
      if ($jahr1 > $jahr2) {
         $tmp = $jahr1;
         $jahr1 = $jahr2;
         $jahr2 = $tmp;
      }
      echo "<table style='border-collapse:collapse;width:100%;margin-left:0;'>";
      echo "<tr><th style='border:1px solid black;padding:4px;'>Jahr</th><th style='border:1px solid black;padding:4px;'>Datum</th></tr>";
      for ($jahr = $jahr1; $jahr <= $jahr2; $jahr++) {
         $tag = 0;
         $monat = "";
         ostersonntag($jahr, $tag, $monat);
         $datum = sprintf("%02d.%02d.%d", $tag, $monat, $jahr);
         echo "<tr><td style='border:1px solid black;padding:4px;text-align:center;'>$jahr</td><td style='border:1px solid black;padding:4px;text-align:center;'>$datum</td></tr>";
      }
      echo "</table>";
   } else {
      echo "<p>Bitte geben Sie zwei gültige Jahreszahlen ein.</p>";
   }
   echo "</div>";
   ?>
</body>

</html>