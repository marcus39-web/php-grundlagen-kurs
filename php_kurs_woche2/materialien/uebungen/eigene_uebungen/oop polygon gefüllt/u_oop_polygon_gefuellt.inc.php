<?php
declare(strict_types=1);

require_once __DIR__ . '/../oop punkt/u_oop_punkt.inc.php';
require_once __DIR__ . '/../oop polygon/u_oop_polygon.inc.php';

/**
 * Klasse PolygonGefuellt
 * 
 * Beschreibt ein gefülltes Polygon im zweidimensionalen Koordinatensystem.
 * Erbt von der Klasse Polygon und erweitert sie um eine Füllfarbe.
 * 
 * @author Marcus Reiser
 * @since 1.0.0
 * 
 * @see Polygon
 */
class PolygonGefuellt extends Polygon {
    
    /**
     * Konstruktor
     * 
     * @param array $punkte Array von Punkt-Objekten (Standard: leeres Array)
     * @param string $farbe Füllfarbe des Polygons (Standard: "Keine Farbe")
     */
    public function __construct(
        array $punkte = [],
        private string $farbe = "Keine Farbe"
    ) {
        parent::__construct($punkte);
    }
    
    /**
     * Getter für die Farbe
     * 
     * @return string Füllfarbe des Polygons
     */
    public function getFarbe(): string {
        return $this->farbe;
    }
    
    /**
     * Setter für die Farbe
     * 
     * @param string $farbe Neue Füllfarbe
     */
    public function setFarbe(string $farbe): void {
        $this->farbe = $farbe;
    }
    
    /**
     * Färbt das Polygon mit einer neuen Farbe
     * 
     * @param string $farbe Neue Füllfarbe
     */
    public function faerben(string $farbe): void {
        $this->farbe = $farbe;
    }
    
    /**
     * Magische Methode zur String-Darstellung
     * Erweitert die Ausgabe der Elternklasse um die Farbinformation
     * 
     * @return string Alle Punkte des Polygons mit Farbinformation
     */
    public function __toString(): string {
        return parent::__toString() . " $this->farbe";
    }
}
