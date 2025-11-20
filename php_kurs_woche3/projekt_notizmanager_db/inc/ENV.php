<?php
declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;

class ENV {
    public static function load(string $dbasePath): void {
        $dotenv = Dotenv::createImmutable($dbasePath);
        $dotenv->load();
    }
}