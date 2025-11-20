<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
 
    session_start();
 
    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';
 
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $cat = $_POST['category_id'] ?? null;
    $catID = ($cat === '' ? null : (int)$cat);

if ($title !== '' && $content !== '') {
   addNote($pdo, $title, $content, $catID);
}
header('Location: index.php');