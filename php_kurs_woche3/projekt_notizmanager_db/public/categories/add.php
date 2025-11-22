<?php
require_once '../../inc/db-connect.php';
require_once '../../inc/functions.php';

$name = trim($_POST['name'] ?? '');
if ($name !== '') {
    $stmt = $pdo->prepare('INSERT INTO categories (name) VALUES (?)');
    $stmt->execute([$name]);
}
header('Location: ../categ-manager.php');
exit;
