<?php
declare(strict_types=1);
// ! die folgenden 2 Zeilen in der Produktiv-Variante löschen!
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/../inc/db-connect.php';
require_once __DIR__ . '/../inc/functions.php';

$id = (int)($_POST['id'] ?? 0);

if($id) { deleteNote($pdo, $id); }

header('Location: index.php');
exit;