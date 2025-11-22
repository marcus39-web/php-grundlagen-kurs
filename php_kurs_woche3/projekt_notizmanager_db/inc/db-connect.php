<?php
declare(strict_types=1);
/**
 * db-connect.php – Datenbankverbindung
 *
 * Stellt eine PDO-Verbindung zur MySQL-Datenbank her.
 * Verwendet Umgebungsvariablen aus der .env-Datei.
 * Lädt bootstrap.php für Umgebungsvariablen.
 */
// Notiz: Datei-Header und Kurzbeschreibung

require __DIR__ . '/bootstrap.php';
// Notiz: Lädt die Umgebungsvariablen aus bootstrap.php

try {
  $dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=%s',
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_CHARSET'],
  );
  // Notiz: Baut den DSN-String für die PDO-Verbindung

  $pdo = new PDO(
    $dsn,
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ]
  );
  // Notiz: Erstellt die PDO-Verbindung mit Fehler- und Fetch-Optionen
} catch (PDOException $e) {
  echo 'DB-Fehler: ' . htmlspecialchars($e->getMessage());
  // Notiz: Gibt einen Fehler aus, falls die Verbindung fehlschlägt
}
