<?php
declare(strict_types=1);
/**
 * logout.php – Benutzer abmelden
 *
 * Meldet den Benutzer ab, setzt last_activity auf NULL und leitet zur Startseite weiter.
 */
// Notiz: Datei-Header und Kurzbeschreibung

// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);
// Notiz: Fehleranzeige für Entwicklung

session_start();
// Notiz: Startet die Session

// Datenbankverbindung für last_activity Update
require_once __DIR__ . '/../inc/db-connect.php';
// Notiz: Datenbankverbindung

// Setze last_activity auf NULL beim Logout
if (!empty($_SESSION['user'])) {
  $stmt = $pdo->prepare('UPDATE users SET last_activity = NULL WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  // Notiz: Setzt die Aktivität des Benutzers auf NULL
}

$_SESSION = array();
// Notiz: Leert die Session-Daten

session_destroy();
// Notiz: Beendet die Session

header('Location: ../index.php');
exit;
// Notiz: Weiterleitung zur Startseite