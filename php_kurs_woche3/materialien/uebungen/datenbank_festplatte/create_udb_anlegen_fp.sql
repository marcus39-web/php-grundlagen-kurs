-- ============================================================================
-- DATENBANK ERSTELLEN
-- ============================================================================

-- Datenbank anlegen für Hardware-Informationen (Übung »u_db_anlegen«)
-- Datum: 25.11.2025

-- Falls die Datenbank bereits existiert, löschen
-- IF EXISTS verhindert Fehler, wenn DB nicht vorhanden ist
DROP DATABASE IF EXISTS hardware;

-- Datenbank neu anlegen mit UTF-8 Zeichensatz
-- CHARACTER SET utf8mb4: Unterstützt alle Unicode-Zeichen (auch Emojis)
-- COLLATE utf8mb4_unicode_ci: Sortierung nach Unicode-Standard (case-insensitive)
CREATE DATABASE hardware
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- Datenbank verwenden (alle folgenden Befehle beziehen sich auf diese DB)
USE hardware;

-- ============================================================================
-- TABELLE ERSTELLEN
-- ============================================================================

-- Tabelle fp (Festplatten) anlegen mit allen Spalten und deren Eigenschaften
CREATE TABLE fp (
    -- Artikelnummer: Eindeutiger Primärschlüssel
    -- VARCHAR(15): Zeichenkette mit maximal 15 Zeichen (z.B. "HDA-140")
    -- NOT NULL: Feld muss immer ausgefüllt sein
    -- PRIMARY KEY: Eindeutige Identifikation, automatisch indexiert
    artnummer VARCHAR(15) NOT NULL PRIMARY KEY COMMENT 'Eindeutige Artikelnummer der Festplatte',
    
    -- Hersteller: Name des Herstellers
    -- VARCHAR(25): Zeichenkette mit maximal 25 Zeichen (z.B. "IBM Corporation")
    -- NOT NULL: Pflichtfeld
    hersteller VARCHAR(25) NOT NULL COMMENT 'Hersteller der Festplatte',
    
    -- Typ: Modellbezeichnung der Festplatte
    -- VARCHAR(25): Zeichenkette mit maximal 25 Zeichen (z.B. "DJNA 3F2200")
    -- NOT NULL: Pflichtfeld
    typ VARCHAR(25) NOT NULL COMMENT 'Typbezeichnung der Festplatte',
    
    -- Speicherkapazität in Gigabyte
    -- INT(11): Ganzzahl mit maximal 11 Stellen (ausreichend für GB-Werte)
    -- NOT NULL: Pflichtfeld
    gb INT(11) NOT NULL COMMENT 'Speicherkapazität in Gigabyte',
    
    -- Preis der Festplatte
    -- DOUBLE: Fließkommazahl für Dezimalwerte (z.B. 230.00 oder 122.50)
    -- NOT NULL: Pflichtfeld
    preis DOUBLE NOT NULL COMMENT 'Preis der Festplatte',
    
    -- Produktionsdatum: Wann wurde die Festplatte erstmals produziert
    -- DATE: Datum im Format YYYY-MM-DD (z.B. 2008-06-15)
    -- NOT NULL: Pflichtfeld
    prod DATE NOT NULL COMMENT 'Erstes Produktionsdatum'
    
-- Tabellen-Engine und Zeichensatz
-- ENGINE=InnoDB: Moderne Storage Engine mit Transaktionsunterstützung
-- DEFAULT CHARSET=utf8mb4: Zeichensatz für die Tabelle
-- COLLATE=utf8mb4_unicode_ci: Sortierregel (case-insensitive)
-- COMMENT: Beschreibung der Tabelle
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabelle für Festplatten-Informationen';

-- ============================================================================
-- TESTDATEN EINFÜGEN
-- ============================================================================

-- Testdaten einfügen (basierend auf Abbildung 3.8)
-- INSERT INTO: Fügt neue Zeilen in die Tabelle ein
-- VALUES: Liste der einzufügenden Werte in der Reihenfolge der Spalten
INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) VALUES
    -- Datensatz 1: IBM Festplatte mit 240 GB
    ('IBM Corporation', 'DJNA 3F2200', 240, 230, 'HDA-140', '2008-06-15'),
    
    -- Datensatz 2: Seagate Festplatte mit 60 GB
    ('Seagate', '31023 2A', 60, 122, 'HDA-144', '2008-11-15'),
    
    -- Datensatz 3: Quantum Festplatte mit 80 GB
    ('Quantum', 'Fireball Plus', 80, 128, 'HDA-163', '2008-03-15'),
    
    -- Datensatz 4: Fujitsu Festplatte mit 160 GB
    ('Fujitsu', 'MPF 3136', 160, 149, 'HDA-171', '2008-09-01'),
    
    -- Datensatz 5: Quantum Festplatte mit 40 GB
    ('Quantum', 'Fireball CX', 40, 112, 'HDA-208', '2008-10-01');

-- ============================================================================
-- KONTROLLE: ALLE DATEN ANZEIGEN
-- ============================================================================

-- Abfrage zur Kontrolle: Zeigt alle eingefügten Datensätze
-- SELECT *: Alle Spalten auswählen
-- FROM fp: Aus der Tabelle fp
-- ORDER BY artnummer: Sortiert nach Artikelnummer aufsteigend
SELECT * FROM fp ORDER BY artnummer;