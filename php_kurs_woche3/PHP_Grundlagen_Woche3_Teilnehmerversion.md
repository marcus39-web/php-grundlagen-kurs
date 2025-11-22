# PHP Grundlagen – Woche 3 (Teilnehmerversion) · Abschlussprojekt „Notiz‑Manager DB“

## Überblick

**Dauer:** 5 Tage × 8 UE = 40 UE  
**Ziel:** Umsetzung des vollständigen Notiz‑Managers mit Datenbank (MariaDB + PHP PDO).  
Am Ende der Woche kannst Du ein CRUD‑System mit sicherer Datenbank‑Anbindung, Login und einfachem Layout realisieren.

---

## Tag 11 – Einstieg Datenbanken & SQL‑Grundlagen

### Lernziele Tag 11

- Verständnis für relationale Datenbanken und Tabellenstruktur  
- SQL‑Befehle: `CREATE TABLE`, `INSERT`, `SELECT`, `UPDATE`, `DELETE`  
- Verbindung zu MariaDB / MySQL über VS Code oder CLI

### Übung 1 – Datenbank einrichten

1. Erstelle eine neue Datenbank `notizmanager`.  
2. Lege eine Tabelle `notes` an mit den Feldern: `id`, `title`, `content`, `created_at`.  
3. Füge Testdaten ein und rufe sie per SQL ab.

```sql
CREATE TABLE notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Tag 12 – PDO & Datenbankzugriff in PHP

### Lernziele Tag 12

- PHP PDO kennenlernen (Verbindung, Fehlerbehandlung, Abfragen)  
- Prepared Statements und Parameterbindung  
- Lesen und Einfügen von Datensätzen

### Übung 2 – PDO‑Verbindung

Erstelle eine Datei `db.php`, die eine PDO‑Verbindung zur Datenbank aufbaut.  
Teste sie mit einem einfachen `SELECT * FROM notes;`.

```php
<?php
$pdo = new PDO('mysql:host=localhost;dbname=notizmanager;charset=utf8mb4', 'user', 'pass', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>
```

---

## Tag 13 – CRUD Operationen (Create, Read, Update, Delete)

### Lernziele Tag 13

- Formulare für neue Notizen (Create)  
- Anzeige aller Notizen (Read)  
- Bearbeitung (Update) und Löschen (Delete)  
- Trennung von Funktionen und Views

### Übung 3 – CRUD‑Funktionen

Erstelle eine Datei `functions.php` mit diesen Funktionen:  

- `getAllNotes($pdo)`  
- `addNote($pdo, $title, $content)`  
- `updateNote($pdo, $id, $title, $content)`  
- `deleteNote($pdo, $id)`

Nutze Prepared Statements und HTML‑Escaping (`htmlspecialchars`).

---

## Tag 14 – Login & Benutzerverwaltung (Optional)

### Lernziele Tag 14

- Grundlagen von Session Handling und Login‑Formularen  
- Passwort‑Hashing (`password_hash`, `password_verify`)  
- Zugriffsschutz auf Admin‑Seiten

### Übung 4 – Login

Erstelle eine Tabelle `users` mit `id`, `username`, `password_hash`.  
Implementiere ein einfaches Login‑Formular mit Session.  
Bei Erfolg → Startseite, bei Fehler → Hinweis.

```php
<?php
session_start();
// Login prüfen
?>
```

---

## Tag 15 – Abschlussprojekt „Notiz‑Manager DB“ + Präsentation

### Lernziele Tag 15

- Kombination aller Komponenten (PDO + CRUD + Session)  
- Clean Code & Dateistruktur anwenden  
- Projekt präsentieren und reflektieren

### Projektaufgabe

Erstelle den vollständigen Notiz‑Manager mit Datenbank und Login.  
Mögliche Dateistruktur:

```txt
project/
│
├─ inc/
│   ├─ db.php
│   └─ functions.php
├─ public/
│   ├─ index.php
│   ├─ add.php
│   ├─ edit.php
│   ├─ delete.php
│   └─ login.php
└─ style/style.css
```

**Bonus:**  

- Suchfeld nach Titel oder Inhalt  
- Sortierung nach Datum  
- Optional: AJAX‑Einbindung für Live‑Update

---

## Selbstlernblock (Mittwoch Vormittag)

### Aufgabe

Schreibe SQL‑Statements, um eine Tabelle `categories` anzulegen und mit der Tabelle `notes` per Fremdschlüssel zu verbinden.

```sql
ALTER TABLE notes ADD COLUMN category_id INT;
ALTER TABLE notes
  ADD CONSTRAINT fk_notes_category
  FOREIGN KEY (category_id) REFERENCES categories(id);
```

---

## Multiple‑Choice‑Test #3 (Themen)

1. Datenbank‑Grundlagen (Tabellen, Datentypen, SQL‑Befehle)  
2. PDO & Prepared Statements  
3. CRUD‑Operationen in PHP  
4. Sessions und Login‑Grundlagen  
5. Sicherheit und Fehlerbehandlung  

---

## Ressourcen

- **style.css** aus voriger Woche  
- **Beispiel‑/Übungsdateien** folgen als Paket  
- **Cheatsheet:** SQL & PDO‑Befehle  

---

© 2025 – Teilnehmerversion · JAderBass web’n’more
