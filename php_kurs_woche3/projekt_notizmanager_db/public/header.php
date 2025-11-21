<?php
/**
 * header.php - Allgemeiner Seitenkopf
 * 
 * Wird auf allen Seiten eingebunden.
 * Startet Session, lädt Datenbank und Funktionen,
 * aktualisiert last_activity für eingeloggte User.
 */
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

session_start();

// Pfad ermitteln für korrekte Pfade in includes
$uri = $_SERVER['SCRIPT_FILENAME'];

$path = ( !str_ends_with(dirname($uri),'public') ) ? '../' : '' ;

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

// Aktualisiere last_activity für eingeloggte Benutzer
if (!empty($_SESSION['user'])) {
  $stmt = $pdo->prepare('UPDATE users SET last_activity = NOW() WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noziz-Manager DB</title>
  
  <link rel="stylesheet" href="<?= $path ?>../css/style.css">
</head>
<body>
  <?php include_once 'nav.php' ?>
  <header>
    <div class="container">
      <h1>Notiz-Manager DB</h1>
      
    </div>
  </header>