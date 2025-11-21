<?php
/**
 * logout.php - Benutzer abmelden
 * 
 * Meldet den Benutzer ab, setzt last_activity auf NULL
 * und leitet zur Startseite weiter.
 */
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

session_start();

// Datenbankverbindung für last_activity Update
require_once __DIR__ . '/../inc/db-connect.php';

// Setze last_activity auf NULL beim Logout
if (!empty($_SESSION['user'])) {
  $stmt = $pdo->prepare('UPDATE users SET last_activity = NULL WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
}

$_SESSION = array();

session_destroy();

header('Location: ../index.php');
exit;