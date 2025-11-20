<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';

    $id = (int)($POST['id'] ?? 0);
    
    if($id) { deletNode($pdo, $id);
    }
?>
