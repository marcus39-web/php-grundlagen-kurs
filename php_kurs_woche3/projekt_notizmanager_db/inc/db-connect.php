<?php
declare(strict_types=1);

require_once  __DIR__ .   '/ENV.php';

try {
$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=%s',
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_CharSET']

);
 $pdo = new PDO(
    $dsn,
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ]
    );
}catch (PDOException $e) {
  echo 'DB-Fehler: ' . htmlspecialchars($e->getMessage());
}