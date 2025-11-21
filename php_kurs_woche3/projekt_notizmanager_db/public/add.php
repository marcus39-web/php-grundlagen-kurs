<?php
/**
 * add.php - Neue Notiz hinzufügen
 * 
 * Verarbeitet das Formular zum Erstellen einer neuen Notiz.
 * Die Notiz wird automatisch dem eingeloggten Benutzer zugeordnet.
 * Nach dem Speichern erfolgt Weiterleitung zur index.php.
 */
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

session_start();

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

// POST-Daten empfangen und bereinigen
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cat = $_POST['category_id'] ?? '';
$catId = ($cat === '' ? null : (int)$cat);

if ($title !== '' && $content !== '') {
  addNote($pdo, $title, $content, $catId);
}

header('Location: index.php');
exit;