<?php
/**
 * add.php – Neue Notiz hinzufügen
 *
 * Diese Datei verarbeitet das Formular zum Erstellen einer neuen Notiz und speichert sie in der Datenbank.
 * Nach dem Speichern erfolgt eine Weiterleitung zur Übersicht.
 */
// Notiz: Datei-Header und Kurzbeschreibung

declare(strict_types=1);
// Notiz: Aktiviert strikte Typisierung für PHP

// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);
// Notiz: Zeigt alle Fehler an (nur für Entwicklung!)

session_start();
// Notiz: Startet die Session, um Benutzerinfos zu nutzen

require_once __DIR__ . '/../inc/db-connect.php';
// Notiz: Bindet die Datenbankverbindung ein

require_once __DIR__ . '/../inc/functions.php';
// Notiz: Bindet Hilfsfunktionen ein (z.B. addNote)

$title = trim($_POST['title'] ?? '');
// Notiz: Holt und bereinigt den Titel aus dem Formular

$content = trim($_POST['content'] ?? '');
// Notiz: Holt und bereinigt den Inhalt aus dem Formular

$cat = $_POST['category_id'] ?? '';
// Notiz: Holt die Kategorie-ID aus dem Formular

$catId = ($cat === '' ? null : (int)$cat);
// Notiz: Wandelt die Kategorie-ID in einen Integer oder null um

if ($title !== '' && $content !== '') {
  addNote($pdo, $title, $content, $catId);
  // Notiz: Fügt die Notiz in die Datenbank ein, wenn Titel und Inhalt vorhanden sind
}

header('Location: index.php');
exit;
// Notiz: Leitet nach dem Speichern zurück zur Übersicht und beendet das Skript