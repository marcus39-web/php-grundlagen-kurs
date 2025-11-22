<?php
declare(strict_types=1);
/**
 * update.php – Notiz aktualisieren
 *
 * Diese Datei verarbeitet das Bearbeitungsformular und aktualisiert eine bestehende Notiz.
 * Normale User können nur ihre eigenen Notizen bearbeiten, Admin kann alle Notizen bearbeiten.
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
// Notiz: Notiz-ID aus POST empfangen

$title = trim($_POST['title'] ?? '');
// Notiz: Titel aus POST empfangen und bereinigen

$content = trim($_POST['content'] ?? '');
// Notiz: Inhalt aus POST empfangen und bereinigen

$cat = $_POST['category_id'] ?? '';
// Notiz: Kategorie-ID aus POST empfangen

$catId = ($cat === '' ? null : (int)$cat);
// Notiz: Kategorie-ID in Integer oder null umwandeln

if ($id && $title !== '' && $content !== '') {
  updateNote($pdo, $id, $title, $content, $catId);
  // Notiz: Aktualisiert die Notiz, wenn alle Felder ausgefüllt sind
}
header('Location: index.php');
exit;
// Notiz: Weiterleitung zur Übersicht