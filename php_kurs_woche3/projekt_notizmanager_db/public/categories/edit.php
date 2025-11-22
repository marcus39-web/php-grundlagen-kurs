
<?php
/**
 * edit.php – Kategorie bearbeiten
 *
 * Zeigt das Bearbeitungsformular für eine bestehende Kategorie und verarbeitet die Aktualisierung.
 * Nach erfolgreicher Änderung erfolgt eine Weiterleitung zur Kategorienübersicht.
 */
// Notiz: Datei-Header und Funktionsbeschreibung

include_once '../header.php';
// Notiz: Bindet das Header-Template ein
require_once '../../inc/db-connect.php';
// Notiz: Bindet die Datenbankverbindung ein
require_once '../../inc/functions.php';
// Notiz: Bindet Hilfsfunktionen ein

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// Notiz: Holt die Kategorie-ID aus der URL und wandelt sie in einen Integer um
$stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
$stmt->execute([$id]);
$category = $stmt->fetch();
// Notiz: Holt die Kategorie aus der Datenbank
if(!$category) { header('Location: ../categ-manager.php'); exit; }
// Notiz: Weiterleitung, falls Kategorie nicht existiert

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    // Notiz: Holt und bereinigt den neuen Kategorienamen aus dem Formular
    if ($name !== '') {
        $stmt = $pdo->prepare('UPDATE categories SET name = ? WHERE id = ?');
        $stmt->execute([$name, $id]);
        // Notiz: Aktualisiert den Namen der Kategorie in der Datenbank
        header('Location: ../categ-manager.php');
        // Notiz: Leitet nach dem Speichern zurück zur Kategorienübersicht
        exit;
        // Notiz: Beendet das Skript
    }
}
?>
<main class="container">
  <form action="edit.php?id=<?= (int)$category->id ?>" method="post">
    <label>Kategorie-Name <input type="text" name="name" value="<?= safe($category->name) ?>" required></label>
    <!-- Notiz: Eingabefeld für den Kategorienamen -->
    <button type="submit">Speichern</button>
    <!-- Notiz: Button zum Speichern der Änderung -->
    <a href="../categ-manager.php" class="button">Abbrechen</a>
    <!-- Notiz: Button zum Abbrechen und Zurück zur Übersicht -->
  </form>
</main>
<?php include_once '../footer.php'; ?>
// Notiz: Bindet das Footer-Template ein
