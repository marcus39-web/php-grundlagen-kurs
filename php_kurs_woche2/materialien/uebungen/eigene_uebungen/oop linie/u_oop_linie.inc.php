<?php
declare(strict_types=1);

require_once __DIR__ . '/../oop punkt/u_oop_punkt.inc.php';

/**
 * Klasse Linie
 * 
 * Beschreibt eine Linie im zweidimensionalen Koordinatensystem
 * durch zwei Punkte (Anfangs- und Endpunkt).
 * 
 * @author Marcus Reiser
 * @since 1.0.0
 */
class Linie {
    
    /**
     * Konstruktor mit Constructor Property Promotion
     * 
     * @param Punkt $anfang Anfangspunkt der Linie (Standard: neuer Punkt bei 0|0)
     * @param Punkt $ende Endpunkt der Linie (Standard: neuer Punkt bei 0|0)
     */
    public function __construct(
        private Punkt $anfang = new Punkt(),
        private Punkt $ende = new Punkt()
    ) {
    }
    
    /**
     * Getter für Anfangspunkt
     * 
     * @return Punkt Anfangspunkt der Linie
     */
    public function getAnfang(): Punkt {
        return $this->anfang;
    }
    
    /**
     * Getter für Endpunkt
     * 
     * @return Punkt Endpunkt der Linie
     */
    public function getEnde(): Punkt {
        return $this->ende;
    }
    
    /**
     * Setter für Anfangspunkt
     * 
     * @param Punkt $anfang Neuer Anfangspunkt
     */
    public function setAnfang(Punkt $anfang): void {
        $this->anfang = $anfang;
    }
    
    /**
     * Setter für Endpunkt
     * 
     * @param Punkt $ende Neuer Endpunkt
     */
    public function setEnde(Punkt $ende): void {
        $this->ende = $ende;
    }
    
    /**
     * Verschiebt die Linie um die angegebenen Werte
     * (verschiebt beide Punkte um denselben Betrag)
     * 
     * @param float $dx Verschiebung in X-Richtung
     * @param float $dy Verschiebung in Y-Richtung
     */
    public function verschieben(float $dx, float $dy): void {
        $this->anfang->verschieben($dx, $dy);
        $this->ende->verschieben($dx, $dy);
    }
    
    /**
     * Magische Methode zur String-Darstellung
     * 
     * @return string Linie im Format (x1|y1) (x2|y2)
     */
    public function __toString(): string {
        return "$this->anfang $this->ende";
    }
}
