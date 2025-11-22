# PHP Grundlagen – Woche 1 (Teilnehmerversion) · Mini‑Blog

## Überblick

**Dauer:** 5 Tage × 8 UE = 40 UE  
**Ziel:** Einrichtung der Entwicklungsumgebung und Einstieg in PHP 8.4 Grundlagen.  
Am Ende der Woche kannst Du einfache Skripte schreiben und einen Mini‑Blog mit Beiträgen aus Arrays anzeigen.

---

## Tag 1 – Setup & Erste Schritte

### Lernziele Tag 1

- Virtuelle Maschine mit Ubuntu Server einrichten  
- Apache, PHP 8.4, MariaDB installieren  
- VS Code mit SSH verbinden  
- Git & GitHub nutzen  
- Erste PHP‑Ausgabe im Browser testen

### Übung 1

1. Erstelle eine Datei `index.php` mit folgendem Inhalt:  
  
   ```php
   <?php
   echo "Hallo PHP 8.4!";
   ```  

2. Öffne sie über `http://localhost` im Browser.  
3. Lade das Projekt auf Dein GitHub‑Repo hoch.

---

## Tag 2 – Syntax, Datentypen, Operatoren

### Lernziele Tag 2

- PHP‑Syntax verstehen (Echo, Kommentare, Variablen, Datentypen)  
- Operatoren und Strings verwenden  
- HTML und CSS einbinden

### Beispiel

```php
<?php
$name = "Alex";
$zahl = 7;
echo "<p>Hallo $name, deine Glückszahl ist $zahl.</p>";
```

### Übung 2

Erstelle eine Seite, die Name, Alter und Lieblingsfarbe anzeigt.  
Gestalte die Ausgabe mit CSS (`style.css` ist bereitgestellt).

---

## Tag 3 – Kontrollstrukturen & Funktionen

### Lernziele Tag 3

- `if`, `elseif`, `else`, `switch` anwenden  
- Schleifen (`for`, `foreach`, `while`) nutzen  
- Funktionen mit Parametern und Rückgabewerten schreiben

### Übung 3 – Notenrechner

Programmiere ein Skript, das eine Punktzahl einliest und eine Note ausgibt.  
Bonus: Zeige je nach Note eine Farbe (grün = gut, rot = schlecht).

### Übung 4 – Funktionen

Schreibe eine Funktion `berechneMwst($netto, $mwst = 0.19)` und gib den Bruttopreis mit 2 Nachkommastellen aus.

---

## Tag 4 – Arrays & Formulare

### Lernziele Tag 4

- Arrays erstellen (indiziert / assoziativ)  
- Schleifen mit `foreach` anwenden  
- HTML‑Formulare auswerten (GET/POST) und Validierung prüfen

### Übung 5 – Kontaktformular

Baue ein Formular, in dem Benutzer eine Nachricht eingeben und abschicken können.  
Zeige die Eingabe darunter formatiert an.

```php
<?php
// Dein Code hier
?>
```

---

## Tag 5 – Mini‑Blog Grundversion

### Lernziele Tag 5

- Inhalte aus Arrays anzeigen  
- einfache Funktionen zur Formatierung verwenden  
- Layout mit CSS anwenden

### Übung 6 – Mini‑Blog

Erstelle ein Array mit 3 Beiträgen (`title`, `author`, `date`, `content`) und gib sie im Browser aus.

**Grundgerüst:**

```php
<?php
$posts = [
  ["title" => "Erster Beitrag", "author" => "Alex", "content" => "Willkommen im Blog!"],
];
?>
<div class="post">
  <h2><?= htmlspecialchars($posts[0]['title']) ?></h2>
  <p><?= htmlspecialchars($posts[0]['content']) ?></p>
</div>
```

---

## Selbstlernblock (Mittwoch Vormittag)

### Aufgabe

Erstelle eine eigene Visitenkarte in PHP:  

- Zeige Name, Wohnort, Hobby und aktuelles Datum an.  
- Verwende HTML und CSS zur Gestaltung.  

Beispiel:  

```php
<?php
$name = "Sam";
$ort = "Erfurt";
$hobby = "Bass spielen";
$datum = date("d.m.Y");
?>
<p><?= "$name aus $ort – Hobby: $hobby ($datum)" ?></p>
```

---

## Multiple‑Choice‑Test #1 (Themen)

1. PHP‑Syntax und Datentypen  
2. Kontrollstrukturen und Operatoren  
3. Arrays und Funktionen  
4. Formulare und Superglobals

---

## Ressourcen

- **style.css** (Vorlage für einheitliches Design)  
- **Cheatsheet „PHP‑Syntax Basics“**  
- **Git‑Spickzettel** (Befehle: init, add, commit, push)

---

© 2025 – Teilnehmerversion · JAderBass web’n’more
