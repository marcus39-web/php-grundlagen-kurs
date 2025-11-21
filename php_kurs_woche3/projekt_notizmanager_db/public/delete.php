<?php
/**
 * delete.php - Notiz löschen
 * 
 * Löscht eine Notiz anhand der übergebenen ID.
 * Normale User können nur ihre eigenen Notizen löschen,
 * Admin kann alle Notizen löschen.
 */
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

session_start();

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

// Notiz-ID aus POST empfangen
$id = (int)($_POST['id'] ?? 0);

if($id) { deleteNote($pdo, $id); }

header('Location: index.php');
exit;