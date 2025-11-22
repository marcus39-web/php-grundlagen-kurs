<?php
declare(strict_types=1);
/**
 * Env.php – Umgebungsvariablen laden
 *
 * Wrapper-Klasse für vlucas/phpdotenv.
 * Lädt Umgebungsvariablen aus der .env-Datei in $_ENV.
 * Wird von bootstrap.php aufgerufen.
 */
// Notiz: Datei-Header und Kurzbeschreibung

namespace App;
// Notiz: Definiert den Namespace für die Klasse

use Dotenv\Dotenv;
// Notiz: Importiert die Dotenv-Klasse

class Env {
  // Notiz: Statische Hilfsklasse zum Laden der Umgebungsvariablen
  public static function load(string $basePath): void {
    $dotenv = Dotenv::createImmutable($basePath);
    // Notiz: Erstellt eine Dotenv-Instanz für den Basis-Pfad
    $dotenv->load();
    // Notiz: Lädt die Umgebungsvariablen aus der .env-Datei
  }
}