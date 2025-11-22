# PHP Grundlagen – Woche 2 (Teilnehmerversion) · Notiz‑Manager

## Überblick

**Dauer:** 5 Tage × 8 UE = 40 UE  
**Ziel:** Vertiefung der PHP‑Grundlagen (Arrays, Funktionen, Includes, Dateizugriff/JSON, OOP‑Basics) am Projekt „Notiz‑Manager“.  
Am Ende der Woche kannst Du eine kleine Notiz‑App (CRUD light) mit JSON‑Speicher umsetzen.

---

## Tag 6 – Wiederholung & Arrays vertiefen

### Lernziele Tag 6

- Mehrdimensionale Arrays und verschachtelte Daten verstehen  
- Ausgabe und Iteration mit `foreach`

### Übung 1 – Lagerverwaltung

Erstelle ein Array mit Artikeln (`name`, `preis`, `bestand`) und berechne den Gesamtwert.

```php
<?php
// Dein Code hier
?>
```

---

## Tag 7 – Funktionen & Includes

### Lernziele Tag 7

- Wiederverwendbare Funktionen bauen  
- Dateien mit `include`/`require` einbinden

### Übung 2 – Preisberechnung

Schreibe eine Funktion `preisMitMwst($netto, $mwstSatz, $rabatt=0)` und lagere sie in eine eigene Datei aus.

```php
<?php
// inc/tools.php – Deine Funktion(en)
?>
```

```php
<?php
// main.php – Einbindung & Aufruf
?>
```

---

## Tag 8 – Dateizugriff & JSON

### Lernziele Tag 8

- Dateien lesen/schreiben (`file_get_contents`, `file_put_contents`)  
- JSON verarbeiten (`json_encode`, `json_decode`)

### Übung 3 – Notizspeicher

Formular für `title` und `content` erstellen, Daten in `notes.json` speichern und darunter anzeigen.

```php
<?php
// Dein Code hier
?>
```

---

## Tag 9 – OOP‑Einführung & Note‑Klasse

### Lernziele Tag 9

- Klasse/Objekt, Eigenschaften/Methoden, Konstruktor  
- Einfache Datenkapselung

### Übung 4 – Note‑Objekte

Erstelle eine Klasse `Note` und erzeuge mehrere Objekte; gib sie in HTML aus. Optional: Laden aus JSON.

```php
<?php
// class/Note.php – Deine Klasse
?>
```

```php
<?php
// index.php – Nutzung der Klasse
?>
```

---

## Tag 10 – Mini‑Projekt „Notiz‑Manager Light“

### Lernziele Tag 10

- Kombination aller Konzepte (Funktionen + OOP + JSON + Includes)  
- CRUD light: Create, Read, Delete

### Übung 5 – Notiz‑Manager

Baue `index.php`, die Notizen aus `notes.json` lädt, anzeigt und löscht.  
Formular zum Hinzufügen; Lösch‑Buttons je Eintrag. Optional: Suche/Filter.

```php
<?php
// Dein Code hier
?>
```

---

## Selbstlernblock (Mittwoch Vormittag)

### Aufgabe

Schreibe `arrayToTable($array)`, die ein mehrdimensionales Array als HTML‑Tabelle ausgibt.

```php
<?php
// Dein Code hier
?>
```

---

## Multiple‑Choice‑Test #2 (Themen)

1. Arrays & verschachtelte Strukturen  
2. Includes & Dateistrukturierung  
3. JSON lesen/schreiben  
4. OOP‑Grundlagen (Klasse, Objekt, Konstruktor)  
5. Mini‑Projekt‑Logik (Load/Save/Delete)

---

## Ressourcen

- **style.css** (aus Woche 1 wiederverwenden)  
- **Beispiel‑/Übungsdateien** folgen als Paket  
- **Git‑Spickzettel** (init, add, commit, push)

---

© 2025 – Teilnehmerversion · JAderBass web’n’more
