<?php
/**
 * update.php - Notiz aktualisieren
 * 
 * Verarbeitet das Bearbeitungsformular und aktualisiert eine bestehende Notiz.
 * Normale User können nur ihre eigenen Notizen bearbeiten,
 * Admin kann alle Notizen bearbeiten.
 */
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

session_start();

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

// POST-Daten empfangen und bereinigen
$id = (int)($_POST['id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cat = $_POST['category_id'] ?? '';
$catId = ($cat === '' ? null : (int)$cat);

if ($id && $title !== '' && $content !== '') {
  updateNote($pdo, $id, $title, $content, $catId);
}
header('Location: index.php');
exit;