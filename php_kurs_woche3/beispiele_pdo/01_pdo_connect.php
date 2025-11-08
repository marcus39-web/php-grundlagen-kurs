<?php
declare(strict_types=1);
try {
  $pdo = new PDO('mysql:host=localhost;dbname=notizmanager;charset=utf8mb4', 'user', 'pass', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
  echo "Verbindung erfolgreich.";
} catch (PDOException $e) {
  echo "DB‑Fehler: " . htmlspecialchars($e->getMessage());
}
