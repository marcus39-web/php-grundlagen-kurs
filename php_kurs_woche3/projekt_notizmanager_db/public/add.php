<?php
declare(strict_types=1);
require __DIR__ . '/../inc/db.php';
require __DIR__ . '/../inc/functions.php';

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cat = $_POST['category_id'] ?? '';
$catId = ($cat === '' ? null : (int)$cat);

if ($title !== '' && $content !== '') {
  addNote($pdo, $title, $content, $catId);
}
header('Location: index.php');
