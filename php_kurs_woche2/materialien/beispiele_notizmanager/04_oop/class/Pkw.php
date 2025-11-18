<?php

declare(strict_types=1);

require_once __DIR__ . '/Kfz.php';

class Pkw extends Kfz {

    /**
     * Klasse Pkw
     *
     * Beschreibt einen PKW. Erbt von der Klasse Kfz.
     *
     * @author Marcus Reiser
     *
     * @since 1.0.0
     *
     * @see Kfz
     * 

     
     * @param string $farbe Farbe des Kfz.
     * @param string $marke Marke des Kfz. (BMW, Opel, VW, etc.)
     * @param string $typ Typ des Kfz. (Pkw, Lkw, etc.)
     * @param string $motor Motor des Kfz. (Diesel, Benzin, etc.)
     * @param int $ps PS des Kfz.
     * @param int $speed Geschwindigkeit des Kfz. = Default = 0.
     * 
     * @return void.
     */

    function __construct(private string $farbe, private string $marke, private string $typ, private string $motor, private int $ps, private int $speed = 0) {
        parent::__construct($motor, $ps, $marke, $typ, $speed);
    }

    public function setFarbe($farbe) {
        $this->farbe = $farbe;
    }

    public function getFarbe() {
        return $this->farbe;
    }

    function __toString() {
        // Die Methode __toString() der Eltern-Klasse wird erweitert
        return parent::__toString() . " und hat die Farbe $this->farbe";
    }
}