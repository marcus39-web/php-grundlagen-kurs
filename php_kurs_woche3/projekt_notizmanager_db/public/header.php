
<?php
/**
 * header.php – Allgemeiner Seitenkopf
 *
 * Wird auf allen Seiten eingebunden. Startet die Session, lädt Datenbank und Funktionen,
 * aktualisiert last_activity für eingeloggte User.
 */
// Notiz: Datei-Header und Kurzbeschreibung

// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);
// Notiz: Fehleranzeige für Entwicklung

session_start();
// Notiz: Startet die Session

// Pfad ermitteln für korrekte Pfade in includes
$uri = $_SERVER['SCRIPT_FILENAME'];
// Notiz: Holt den aktuellen Skript-Pfad

$path = ( !str_ends_with(dirname($uri),'public') ) ? '../' : '' ;
// Notiz: Setzt den Pfad für Includes

require_once __DIR__ . '/../inc/db-connect.php';
// Notiz: Datenbankverbindung

require_once __DIR__ . '/../inc/functions.php';
// Notiz: Hilfsfunktionen

// Aktualisiere last_activity für eingeloggte Benutzer
if (!empty($_SESSION['user'])) {
  $stmt = $pdo->prepare('UPDATE users SET last_activity = NOW() WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  // Notiz: Aktualisiert die Aktivität des Benutzers
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notiz-Manager DB</title>
  <!-- Notiz: Seiten-Titel und Meta-Angaben -->
  <link rel="stylesheet" href="<?= $path ?>../css/style.css">
  <!-- Notiz: Einbindung des Stylesheets -->
</head>
<body>
  <header>
    <div class="container">
      <h1>Notiz-Manager DB</h1>
      <!-- Notiz: Hauptüberschrift -->
      <?php include_once 'nav.php' ?>
      <!-- Navigation direkt im Header platziert -->
    </div>
  </header>