<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ .'/inc/pdo-connect.php';

$sql = 'INSERT INTO notes(title, content) VALUES (:t, :c)';

$stmt = $pdo->prepare($sql);
$stmt->execute([':t' => 'Demo via PDO', ':c' => 'Prepared Statements Beispiel']);
echo 'Eintrag gespeichert, ID: ' . (int)$pdo->lastInsertId();
