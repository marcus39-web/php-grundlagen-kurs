<?php
require_once '../../inc/db-connect.php';
require_once '../../inc/functions.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM categories WHERE id = ?');
    $stmt->execute([$id]);
}
header('Location: ../categ-manager.php');
exit;
