<?php
declare(strict_types=1);
$pdo = new PDO('mysql:host=localhost;dbname=notizmanager;charset=utf8mb4', 'user', 'pass', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);
$stmt = $pdo->prepare("INSERT INTO notes(title, content) VALUES (:t, :c)");
$stmt->execute([':t' => 'Demo via PDO', ':c' => 'Prepared Statement Beispiel.']);
echo "Eintrag gespeichert, ID: " . (int)$pdo->lastInsertId();
