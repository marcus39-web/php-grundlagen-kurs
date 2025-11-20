<?php
declare(strict_types=1);

function getAllNotes(PDO $pdo):array {
    $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name AS category
       FROM notes n
       LEFT JOIN categories c
         ON n.category_id = c.id
        ORDER BY n.id DESC';

        return $pdo->query($sql)->fetchAll();
    }
    
    function safe(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_HTML5, 'UTF-8');   
}