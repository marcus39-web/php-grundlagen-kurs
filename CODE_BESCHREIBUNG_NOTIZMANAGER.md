# Projektbeschreibung: projekt-notizmanager_db

## 1. Überblick und Ziel
Das Projekt **projekt-notizmanager_db** ist eine webbasierte PHP-Anwendung zur Verwaltung von Notizen und Kategorien mit Benutzer- und Rechteverwaltung. Ziel ist es, Notizen strukturiert zu speichern, zu bearbeiten und zu organisieren – inklusive Mehrbenutzerfähigkeit und Admin-Funktionen.

## 2. Funktionen der App
- Benutzer können sich registrieren und einloggen
- Notizen anlegen, bearbeiten, löschen
- Kategorien für Notizen verwalten
- Admin kann alle Notizen und Benutzer verwalten
- Online-Status von Benutzern anzeigen
- Passwort ändern und Benutzer abmelden
- Sicherheit durch Session und XSS-Schutz

## 3. Schritt-für-Schritt Aufbau des Codes
### 1. Initialisierung
- **bootstrap.php**: Lädt Composer-Autoloader und Umgebungsvariablen (.env)
- **db-connect.php**: Stellt die Verbindung zur MySQL-Datenbank her
- **Env.php**: Hilfsklasse für Umgebungsvariablen

### 2. Session und Fehleranzeige
- In jeder Datei: `session_start()` und Fehleranzeige für Entwicklung

### 3. Routing und Templates
- **header.php** und **footer.php**: Gemeinsame Layout-Bestandteile
- **nav.php**: Navigation je nach Benutzerstatus

### 4. Hauptfunktionen
- **functions.php**: Enthält alle zentralen Funktionen (CRUD, Authentifizierung, Kategorieverwaltung, Security)
- **public/**: Enthält die eigentlichen Seiten (index.php, add.php, edit.php, delete.php, ...)
- **categories/**: Unterordner für Kategorie-spezifische Aktionen

### 5. Ablauf beim Seitenaufruf
1. Bootstrap und DB-Verbindung werden geladen
2. Session wird gestartet
3. Benutzer wird geprüft (Login/Logout)
4. Daten werden aus der DB geladen und angezeigt
5. Aktionen (CRUD) werden über Formulare ausgeführt

## 4. Tree-Struktur und deren Bedeutung
```
projekt-notizmanager_db/
├── composer.json           # Composer-Konfiguration
├── index.php               # Startseite der App
├── css/                    # Stylesheets
├── inc/                    # Hilfsdateien (DB, Funktionen, Bootstrap)
├── public/                 # Öffentliche Seiten (CRUD, Auth, Navigation)
│   ├── categories/         # Kategorie-spezifische Seiten
│   └── ...                 # Weitere Seiten (add.php, edit.php, ...)
├── vendor/                 # Composer-Abhängigkeiten
```
- **inc/**: Zentrale Logik und Verbindungen
- **public/**: Alle für den Nutzer sichtbaren Seiten
- **categories/**: Trennung der Kategorie-Funktionen für Übersichtlichkeit
- **css/**: Design und Layout
- **vendor/**: Automatisch von Composer verwaltet

## 5. Benennung der Ordner
- **inc** = includes, zentrale Hilfsdateien
- **public** = öffentlich zugängliche Seiten
- **categories** = Unterfunktionen für Kategorien
- **css** = Stylesheets
- **vendor** = externe Bibliotheken

## 6. Datenbankstruktur
**Tabelle: users**
- id (INT, PK)
- username (VARCHAR)
- password_hash (VARCHAR)
- created_at (DATETIME)
- last_activity (DATETIME/NULL)

**Tabelle: notes**
- id (INT, PK)
- user_id (INT, FK)
- title (VARCHAR)
- content (TEXT)
- category_id (INT, FK/NULL)
- created_at (DATETIME)

**Tabelle: categories**
- id (INT, PK)
- name (VARCHAR)

## 7. Ergebnis und Erweiterungsmöglichkeiten
- Die App bietet eine übersichtliche Notizverwaltung mit Mehrbenutzerfähigkeit und Kategorien.
- Erweiterungen möglich:
  - Dateiuploads zu Notizen
  - Kommentarfunktion
  - API-Schnittstelle (z.B. für Mobile Apps)
  - Rechte- und Rollenverwaltung
  - Suchfunktion und Filter
  - Responsive Design und Darkmode

---
*Letzte Aktualisierung: 23.11.2025*
