<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload';

use App\ENV;

//Projektroot laden (eine Ebene höher)
ENV::load(dirname(__DIR__));