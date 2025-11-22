
<?php
/**
 * add.php – Neue Kategorie hinzufügen
 *
 * Diese Datei verarbeitet das Formular zum Erstellen einer neuen Kategorie und speichert sie in der Datenbank.
 * Nach dem Speichern erfolgt eine Weiterleitung zur Kategorienübersicht.
 */
// Notiz: Datei-Header und Funktionsbeschreibung

require_once '../../inc/db-connect.php';
// Notiz: Bindet die Datenbankverbindung ein
require_once '../../inc/functions.php';
// Notiz: Bindet Hilfsfunktionen ein

$name = trim($_POST['name'] ?? '');
// Notiz: Holt und bereinigt den Kategorienamen aus dem Formular
if ($name !== '') {
    $stmt = $pdo->prepare('INSERT INTO categories (name) VALUES (?)');
    $stmt->execute([$name]);
    // Notiz: Fügt die neue Kategorie in die Datenbank ein
}
header('Location: ../categ-manager.php');
// Notiz: Leitet nach dem Speichern zurück zur Kategorienübersicht
exit;
// Notiz: Beendet das Skript
