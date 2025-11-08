<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Erstelle ein Formular mit Feldern: name, msg.
 * 2) Prüfe serverseitig, ob beide Felder gefüllt sind.
 * 3) Gib die Daten unterhalb des Formulars aus.
 */
$name = $_POST["name"] ?? "";
$msg  = $_POST["msg"] ?? "";
$error = ""; // TODO: Validierung
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 5 – Kontaktformular</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 5 – Kontaktformular</h1></header>
  <main class="container">
    <!-- TODO: Fehlermeldung, Formular, Ausgabe -->
  </main>
</body>
</html>
