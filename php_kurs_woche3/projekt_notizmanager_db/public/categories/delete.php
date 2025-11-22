
<?php
/**
 * delete.php – Kategorie löschen
 *
 * Diese Datei löscht eine Kategorie anhand der übergebenen ID.
 * Nach dem Löschen erfolgt eine Weiterleitung zur Kategorienübersicht.
 */
// Notiz: Datei-Header und Funktionsbeschreibung

require_once '../../inc/db-connect.php';
// Notiz: Bindet die Datenbankverbindung ein
require_once '../../inc/functions.php';
// Notiz: Bindet Hilfsfunktionen ein

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
// Notiz: Holt die Kategorie-ID aus dem Formular und wandelt sie in einen Integer um
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM categories WHERE id = ?');
    $stmt->execute([$id]);
    // Notiz: Löscht die Kategorie mit der übergebenen ID aus der Datenbank
}
header('Location: ../categ-manager.php');
// Notiz: Leitet nach dem Löschen zurück zur Kategorienübersicht
exit;
// Notiz: Beendet das Skript
