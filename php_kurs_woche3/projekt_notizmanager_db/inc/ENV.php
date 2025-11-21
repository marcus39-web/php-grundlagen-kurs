<?php
declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;

class Env {
  public static function load(string $basePath): void {
    $dotenv = Dotenv::createImmutable($basePath);
    $dotenv->load();
  }
}