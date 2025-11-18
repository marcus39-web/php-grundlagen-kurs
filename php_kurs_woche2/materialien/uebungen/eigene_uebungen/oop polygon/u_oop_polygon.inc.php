<?php
declare(strict_types=1);

require_once __DIR__ . '/../oop punkt/u_oop_punkt.inc.php';

/**
 * Klasse Polygon
 * 
 * Beschreibt ein Polygon im zweidimensionalen Koordinatensystem.
 * Ein Polygon wird durch eine Folge von Punkten beschrieben,
 * wobei jeder Punkt mit dem nächsten durch eine gerade Linie verbunden wird.
 * Der letzte Punkt wird mit dem ersten Punkt verbunden.
 * 
 * @author Marcus Reiser
 * @since 1.0.0
 */
class Polygon {
    
    /**
     * Konstruktor mit Constructor Property Promotion
     * 
     * @param array $punkte Array von Punkt-Objekten (Standard: leeres Array)
     */
    public function __construct(
        private array $punkte = []
    ) {
    }
    
    /**
     * Getter für alle Punkte
     * 
     * @return array Array mit allen Punkten des Polygons
     */
    public function getPunkte(): array {
        return $this->punkte;
    }
    
    /**
     * Setter für alle Punkte
     * 
     * @param array $punkte Array mit Punkt-Objekten
     */
    public function setPunkte(array $punkte): void {
        $this->punkte = $punkte;
    }
    
    /**
     * Fügt einen Punkt zum Polygon hinzu
     * 
     * @param Punkt $punkt Der hinzuzufügende Punkt
     */
    public function addPunkt(Punkt $punkt): void {
        $this->punkte[] = $punkt;
    }
    
    /**
     * Verschiebt das gesamte Polygon um die angegebenen Werte
     * (verschiebt alle Punkte um denselben Betrag)
     * 
     * @param float $dx Verschiebung in X-Richtung
     * @param float $dy Verschiebung in Y-Richtung
     */
    public function verschieben(float $dx, float $dy): void {
        foreach ($this->punkte as $punkt) {
            $punkt->verschieben($dx, $dy);
        }
    }
    
    /**
     * Magische Methode zur String-Darstellung
     * 
     * @return string Alle Punkte des Polygons oder "(Keine Punkte)" wenn leer
     */
    public function __toString(): string {
        if (empty($this->punkte)) {
            return "(Keine Punkte)";
        }
        
        $result = "";
        foreach ($this->punkte as $punkt) {
            $result .= "$punkt ";
        }
        return rtrim($result); // Entfernt das letzte Leerzeichen
    }
}
