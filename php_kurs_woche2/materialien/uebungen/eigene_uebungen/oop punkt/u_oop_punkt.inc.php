<?php
declare(strict_types=1);

/**
 * Klasse Punkt
 * 
 * Beschreibt einen Punkt im zweidimensionalen Koordinatensystem.
 * 
 * @author Marcus Reiser
 * @since 1.0.0
 */
class Punkt {
    
    /**
     * Konstruktor mit Constructor Property Promotion
     * 
     * @param float $x X-Koordinate (Standard: 0)
     * @param float $y Y-Koordinate (Standard: 0)
     */
    public function __construct(
        private float $x = 0,
        private float $y = 0
    ) {
    }
    
    /**
     * Getter für X-Koordinate
     * 
     * @return float X-Koordinate
     */
    public function getX(): float {
        return $this->x;
    }
    
    /**
     * Getter für Y-Koordinate
     * 
     * @return float Y-Koordinate
     */
    public function getY(): float {
        return $this->y;
    }
    
    /**
     * Setter für X-Koordinate
     * 
     * @param float $x Neue X-Koordinate
     */
    public function setX(float $x): void {
        $this->x = $x;
    }
    
    /**
     * Setter für Y-Koordinate
     * 
     * @param float $y Neue Y-Koordinate
     */
    public function setY(float $y): void {
        $this->y = $y;
    }
    
    /**
     * Verschiebt den Punkt um die angegebenen Werte
     * 
     * @param float $dx Verschiebung in X-Richtung
     * @param float $dy Verschiebung in Y-Richtung
     */
    public function verschieben(float $dx, float $dy): void {
        $this->x += $dx;
        $this->y += $dy;
    }
    
    /**
     * Magische Methode zur String-Darstellung
     * 
     * @return string Koordinaten im Format (x|y)
     */
    public function __toString(): string {
        return "($this->x|$this->y)";
    }
}
