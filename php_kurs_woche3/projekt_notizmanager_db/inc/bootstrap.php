<?php
/**
 * bootstrap.php - Initialisierung
 * 
 * Lädt Composer Autoloader und Umgebungsvariablen aus .env-Datei.
 * Muss vor allen anderen includes geladen werden.
 */
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Env;

// Projektroot laden (eine Ebene höher)
Env::load(dirname(__DIR__));