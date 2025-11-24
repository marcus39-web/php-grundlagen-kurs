<?php
// Fehlerausgabe aktivieren (nur für Entwicklung, nicht für Produktion!)
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
      /* Einfache Tabellen- und Zellenrahmen */
      table,
      td {
         border: 1px solid black;
      }
   </style>
</head>
<body>
   <?php
   // Die Datei mit der Funktion für die Ostersonntagsberechnung einbinden
   include 'ostersonntag.inc.php';

   // Container für die Ausgabe, linksbündig und mit fester Breite
   echo "<div style='width:220px;margin-left:0;'>";
   // Überschrift
   echo "<h1>Ostersonntag</h1>";

   // Prüfen, ob beide Jahreszahlen aus dem Formular übergeben wurden und gültig sind
   if (isset($_GET['jahr1']) && isset($_GET['jahr2']) && is_numeric($_GET['jahr1']) && is_numeric($_GET['jahr2'])) {
      // Eingabewerte auslesen und in Ganzzahlen umwandeln
      $jahr1 = (int)$_GET['jahr1'];
      $jahr2 = (int)$_GET['jahr2'];
      // Falls die Reihenfolge falsch ist, tauschen
      if ($jahr1 > $jahr2) {
         $tmp = $jahr1;
         $jahr1 = $jahr2;
         $jahr2 = $tmp;
      }
      // Tabellenkopf ausgeben
      echo "<table style='border-collapse:collapse;width:100%;margin-left:0;'>";
      echo "<tr><th style='border:1px solid black;padding:4px;'>Jahr</th><th style='border:1px solid black;padding:4px;'>Datum</th></tr>";
      // Für jedes Jahr im Bereich das Datum berechnen und ausgeben
      for ($jahr = $jahr1; $jahr <= $jahr2; $jahr++) {
         // Tag und Monat werden von der Funktion per Referenz gesetzt
         $tag = 0;
         $monat = "";
         ostersonntag($jahr, $tag, $monat); // Berechnung nach Gauß
         // Datum als String im Format TT.MM.JJJJ
         $datum = sprintf("%02d.%02d.%d", $tag, $monat, $jahr);
         // Tabellenzeile ausgeben
         echo "<tr><td style='border:1px solid black;padding:4px;text-align:center;'>$jahr</td><td style='border:1px solid black;padding:4px;text-align:center;'>$datum</td></tr>";
      }
      // Tabelle schließen
      echo "</table>";
   } else {
      // Hinweis, falls keine oder ungültige Eingaben vorhanden sind
      echo "<p>Bitte geben Sie zwei gültige Jahreszahlen ein.</p>";
   }
   // Container schließen
   echo "</div>";
   ?>
</body>
</html>