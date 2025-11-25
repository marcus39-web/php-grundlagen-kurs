-- Datenbank anlegen für Hardware-Informationen (Übung »u_db_anlegen«)
-- Datum: 25.11.2025

-- Falls die Datenbank bereits existiert, löschen
DROP DATABASE IF EXISTS hardware;

-- Datenbank neu anlegen mit UTF-8 Zeichensatz
CREATE DATABASE hardware
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- Datenbank verwenden
USE hardware;

-- Tabelle fp (Festplatten) anlegen
CREATE TABLE fp (
    artnummer VARCHAR(15) NOT NULL PRIMARY KEY COMMENT 'Eindeutige Artikelnummer der Festplatte',
    hersteller VARCHAR(25) NOT NULL COMMENT 'Hersteller der Festplatte',
    typ VARCHAR(25) NOT NULL COMMENT 'Typbezeichnung der Festplatte',
    gb INT(11) NOT NULL COMMENT 'Speicherkapazität in Gigabyte',
    preis DOUBLE NOT NULL COMMENT 'Preis der Festplatte',
    prod DATE NOT NULL COMMENT 'Erstes Produktionsdatum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabelle für Festplatten-Informationen';

-- Testdaten einfügen (basierend auf Abbildung 3.8)
INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) VALUES
    ('IBM Corporation', 'DJNA 3F2200', 240, 230, 'HDA-140', '2008-06-15'),
    ('Seagate', '31023 2A', 60, 122, 'HDA-144', '2008-11-15'),
    ('Quantum', 'Fireball Plus', 80, 128, 'HDA-163', '2008-03-15'),
    ('Fujitsu', 'MPF 3136', 160, 149, 'HDA-171', '2008-09-01'),
    ('Quantum', 'Fireball CX', 40, 112, 'HDA-208', '2008-10-01');

-- Abfrage zur Kontrolle
SELECT * FROM fp ORDER BY artnummer;