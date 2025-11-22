<?php
declare(strict_types=1);
/**
 * bootstrap.php – Initialisierung
 *
 * Lädt Composer Autoloader und Umgebungsvariablen aus der .env-Datei.
 * Muss vor allen anderen includes geladen werden.
 */
// Notiz: Datei-Header und Kurzbeschreibung

require __DIR__ . '/../vendor/autoload.php';
// Notiz: Lädt den Composer Autoloader

use App\Env;
// Notiz: Importiert die Env-Klasse

// Projektroot laden (eine Ebene höher)
Env::load(dirname(__DIR__));
// Notiz: Lädt die Umgebungsvariablen aus der .env-Datei im Projektroot