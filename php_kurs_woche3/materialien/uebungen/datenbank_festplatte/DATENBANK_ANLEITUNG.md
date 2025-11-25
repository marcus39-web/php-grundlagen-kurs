# Datenbank-Erstellung für Hardware-Übungen

## Übersicht
Diese Anleitung zeigt die detaillierte Erstellung der Datenbank `hardware` mit der Tabelle `fp` (Festplatten) für die PHP-Übungen.

---

## 1. Datenbank erstellen

### SQL-Datei: `create_udb_anlegen_fp.sql`

```sql
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
```

### Datenbank ausführen

```bash
mysql -u root -p < /home/rio/projects/create_udb_anlegen_fp.sql
```

---

## 2. Tabellenstruktur

### Tabelle: `fp` (Festplatten)

| Spaltenname | Datentyp | Eigenschaften | Beschreibung |
|-------------|----------|---------------|--------------|
| `artnummer` | VARCHAR(15) | PRIMARY KEY, NOT NULL | Eindeutige Artikelnummer |
| `hersteller` | VARCHAR(25) | NOT NULL | Hersteller der Festplatte |
| `typ` | VARCHAR(25) | NOT NULL | Typbezeichnung |
| `gb` | INT(11) | NOT NULL | Speicherkapazität in GB |
| `preis` | DOUBLE | NOT NULL | Preis in Euro |
| `prod` | DATE | NOT NULL | Erstes Produktionsdatum |

**Storage Engine:** InnoDB  
**Zeichensatz:** UTF-8 (utf8mb4)  
**Kollation:** utf8mb4_unicode_ci

---

## 3. Testdaten

Die Tabelle enthält 5 Festplatten-Datensätze:

| Hersteller | Typ | GB | Preis | Artikelnummer | Produktionsdatum |
|------------|-----|----:|------:|--------------|------------------|
| IBM Corporation | DJNA 3F2200 | 240 | 230 | HDA-140 | 15.06.2008 |
| Seagate | 31023 2A | 60 | 122 | HDA-144 | 15.11.2008 |
| Quantum | Fireball Plus | 80 | 128 | HDA-163 | 15.03.2008 |
| Fujitsu | MPF 3136 | 160 | 149 | HDA-171 | 01.09.2008 |
| Quantum | Fireball CX | 40 | 112 | HDA-208 | 01.10.2008 |

---

## 4. Datenbank verifizieren

### Datenbank existiert prüfen
```bash
mysql -u root -p -e "SHOW DATABASES LIKE 'hardware';"
```

### Tabelle anzeigen
```bash
mysql -u root -p -e "USE hardware; DESCRIBE fp;"
```

### Daten anzeigen
```bash
mysql -u root -p -e "USE hardware; SELECT * FROM fp;"
```

---

## 5. PHP-Datenbankverbindung

### Basis-Verbindung mit PDO

```php
<?php
// Datenbankverbindung herstellen
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=hardware;charset=utf8mb4',
        'root',
        'DEIN_PASSWORT_HIER',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}
?>
```

### Hilfsfunktion für Datumsformatierung

```php
function db_datum_aus($datum) {
    // Datum von YYYY-MM-DD nach DD.MM.YYYY formatieren
    if (empty($datum)) return '';
    $teile = explode('-', $datum);
    if (count($teile) == 3) {
        return $teile[2] . '.' . $teile[1] . '.' . $teile[0];
    }
    return $datum;
}
```

---

## 6. SQL-Abfrage-Beispiele

### Alle Datensätze anzeigen
```sql
SELECT * FROM fp ORDER BY hersteller, typ;
```

### Festplatten mit mehr als 60 GB und Preis unter 150 €
```sql
SELECT * FROM fp 
WHERE gb > 60 AND preis < 150 
ORDER BY gb DESC;
```

### Festplatten aus dem ersten Halbjahr 2008
```sql
SELECT hersteller, typ, prod, artnummer 
FROM fp 
WHERE prod >= '2008-01-01' AND prod <= '2008-06-30' 
ORDER BY prod ASC;
```

### Preisgruppen abfragen
```sql
-- Bis 120 € einschließlich
SELECT hersteller, typ, preis FROM fp WHERE preis <= 120;

-- Ab 120 € ausschließlich und bis 140 € einschließlich
SELECT hersteller, typ, preis FROM fp WHERE preis > 120 AND preis <= 140;

-- Ab 140 € ausschließlich
SELECT hersteller, typ, preis FROM fp WHERE preis > 140;
```

---

## 7. Sicherheit und Best Practices

### MySQL-Benutzer für PHP erstellen

Statt Root-Benutzer sollte ein separater Benutzer verwendet werden:

```sql
CREATE USER 'phpuser'@'localhost' IDENTIFIED BY 'sicheres_passwort';
GRANT ALL PRIVILEGES ON hardware.* TO 'phpuser'@'localhost';
FLUSH PRIVILEGES;
```

### Prepared Statements verwenden

Für sichere Datenbank-Operationen immer Prepared Statements nutzen:

```php
$sql = "SELECT * FROM fp WHERE gb > ? AND preis < ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([60, 150]);
$festplatten = $stmt->fetchAll();
```

---

## 8. Troubleshooting

### Problem: Access denied for user 'root'@'localhost'

**Lösung 1:** Richtiges Passwort in PHP-Datei eintragen

**Lösung 2:** Separaten MySQL-Benutzer erstellen (siehe oben)

### Problem: Datenbank existiert nicht

```bash
# Datenbank neu erstellen
mysql -u root -p < create_udb_anlegen_fp.sql
```

### Problem: Zeichensatz-Probleme

Stelle sicher, dass:
- Datenbank mit UTF-8 erstellt wurde
- PHP-Verbindung `charset=utf8mb4` verwendet
- HTML-Seite `<meta charset="UTF-8">` enthält

---

## 9. Dateipfade im Projekt

```
php-grundlagen-kurs/
└── php_kurs_woche3/
    └── materialien/
        └── uebungen/
            └── datenbank_festplatte/
                ├── create_udb_anlegen_fp.sql    # SQL-Datei zur DB-Erstellung
                ├── DATENBANK_ANLEITUNG.md       # Diese Anleitung
                ├── u_db_anzeigen.php            # Alle Datensätze anzeigen
                ├── u_db_zahl.php                # Gefilterte Anzeige (GB > 60, Preis < 150)
                ├── u_db_datum.php               # Datumsfilter (1. Halbjahr 2008)
                └── u_db_radio.php               # Preisgruppen mit Formular
```

---

## 10. Zusammenfassung

✅ **Datenbank:** `hardware`  
✅ **Tabelle:** `fp` (5 Festplatten-Datensätze)  
✅ **Zeichensatz:** UTF-8 (utf8mb4)  
✅ **Primary Key:** `artnummer`  
✅ **PHP-Verbindung:** PDO mit UTF-8 Support  
✅ **Übungsdateien:** 4 PHP-Dateien für verschiedene Abfragen

---

**Erstellt am:** 25. November 2025  
**Version:** 1.0
