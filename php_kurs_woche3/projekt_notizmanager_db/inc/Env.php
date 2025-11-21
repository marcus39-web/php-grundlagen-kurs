<?php
/**
 * Env.php - Umgebungsvariablen laden
 * 
 * Wrapper-Klasse für vlucas/phpdotenv.
 * Lädt Umgebungsvariablen aus .env-Datei in $_ENV.
 * Wird von bootstrap.php aufgerufen.
 */
declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;

class Env {
  public static function load(string $basePath): void {
    $dotenv = Dotenv::createImmutable($basePath);
    $dotenv->load();
  }
}