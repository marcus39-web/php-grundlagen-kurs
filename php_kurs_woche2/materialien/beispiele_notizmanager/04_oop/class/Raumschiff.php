<?php

class Raumschiff {

/**
 * eine Klassen-Methode ohne Sichtbarkeits Angabe ist
 * immer public
 */

    function __construct(private string $bezeichnung, private string $modell, private int $entfernung = 0) {
//
    }

    function __toString() {
        return "aktuelles Raumschiff: $this->bezeichnung ($this->modell): Erdentfernung $this->entfernung Lichtjahre.";
    }
}