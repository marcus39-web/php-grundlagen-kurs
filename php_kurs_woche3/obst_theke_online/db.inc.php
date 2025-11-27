<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Zentrale Datenbankverbindung für obst_theke_online
// Zugangsdaten bitte anpassen!
$dbHost = 'localhost';
$dbName = 'obst';
$dbUser = 'php_user';
$dbPass = 'Legefeld';

try {
    $pdo = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=utf8",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('Verbindung zur Datenbank fehlgeschlagen: ' . $e->getMessage());
}
