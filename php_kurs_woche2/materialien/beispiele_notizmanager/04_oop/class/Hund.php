<?php
declare(strict_types=1);
require_once __DIR__ . '/Tier.php';
require_once __DIR__ . '/Haustier.php';

class Hund implements Tier, Haustier {
    public function __construct(private string $name, private string $rasse) {
    }

    public function getRasse() {
        return $this->rasse;
    }  

    public function getName() {
        return $this->name;
    }

     public function __toString() {
        return "$this->name ist ein $this->rasse.";
    }
}
