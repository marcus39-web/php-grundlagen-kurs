<?php
declare(strict_types=1);

class Kfz {
    function __construct (private string $motor, private int $ps, private string $marke, private string $typ = '', private int $speed = 0) {
    }

    public function setSpeed($speed) {
        $this->speed = $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setMotor($motor) {
        $this->motor = $motor;
    }

    public function getMotor() {
        return $this->motor;
    }

    public function getPs() {
        return $this->ps;
    }

    public function setPs($ps) {
        $this->ps = $ps;
    }

    public function getTyp() {
        return $this->typ;
    }

    public function setTyp($typ) {
        $this->typ = $typ;
    }

    public function getMarke() {
        return $this->marke;
    }

    public function setMarke($marke) {
        $this->marke = $marke;
    }


    public function __toString() {
        return "$this->marke $this->typ besitzt einen $this->motor Motor hat $this->ps PS und fährt gerade mit $this->speed km/h";
    }
}