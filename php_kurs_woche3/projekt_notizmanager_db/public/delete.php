<?php
declare(strict_types=1);
/**
 * delete.php – Notiz löschen
 *
 * Diese Datei löscht eine Notiz anhand der übergebenen ID.
 * Normale User können nur ihre eigenen Notizen löschen, Admin kann alle Notizen löschen.
 */
// Notiz: Datei-Header und Kurzbeschreibung

// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);
// Notiz: Fehleranzeige für Entwicklung

session_start();
// Notiz: Startet die Session

require_once __DIR__ . '/../inc/db-connect.php';
// Notiz: Datenbankverbindung

require_once __DIR__ . '/../inc/functions.php';
// Notiz: Hilfsfunktionen

$id = (int)($_POST['id'] ?? 0);
// Notiz: Holt die Notiz-ID aus dem POST-Request und wandelt sie in einen Integer um

if($id) {
	// Notiz: Prüft, ob eine gültige ID übergeben wurde
	deleteNote($pdo, $id);
	// Notiz: Löscht die Notiz mit der übergebenen ID aus der Datenbank
}

header('Location: index.php');
// Notiz: Leitet nach dem Löschen zurück zur Notizen-Übersicht
exit;
// Notiz: Beendet das Skript