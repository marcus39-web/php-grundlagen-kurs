<?php
declare(strict_types=1);
require __DIR__ . '/../inc/db.php';
require __DIR__ . '/../inc/functions.php';
$id = (int)($_POST['id'] ?? 0);
if ($id) { deleteNote($pdo, $id); }
header('Location: index.php');
