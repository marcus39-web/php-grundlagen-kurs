<?php
/**
 * edit.php – Notiz bearbeiten
 *
 * Zeigt das Bearbeitungsformular für eine bestehende Notiz.
 * Normale User können nur ihre eigenen Notizen bearbeiten, Admin kann alle Notizen bearbeiten.
 * Bei ungültiger ID oder fehlenden Rechten: Weiterleitung zu index.php
 */
// Notiz: Datei-Header und Kurzbeschreibung

include_once 'header.php';
// Notiz: Bindet das Header-Template ein

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// Notiz: Holt die Notiz-ID aus der URL

$note = $id ? getNoteById($pdo, $id) : null;
// Notiz: Holt die Notiz aus der Datenbank

if(!$note) { header('Location: index.php'); exit; }
// Notiz: Weiterleitung, falls Notiz nicht existiert oder keine Rechte
?>

  <main class="container">
    <form action="update.php" method="post">
      <input type="hidden" name="id" value="<?= (int)$note->id ?>">
      <!-- Notiz: Verstecktes Feld für die Notiz-ID -->
      <label>Titel <input type="text" name="title" value="<?= safe($note->title) ?>" required></label>
      <!-- Notiz: Eingabefeld für den Titel -->
      <label>Inhalt <textarea name="content" rows="10" required><?= nl2br(safe($note->content)) ?></textarea></label>
      <!-- Notiz: Eingabefeld für den Inhalt -->
      <label>Kategorie
        <select name="category_id">
          <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat): ?>
            <option value="<?= (int)$cat->id ?>" <?= ($note->category_id ?? null) == $cat->id ? 'selected' : '' ?> ><?= safe($cat->name) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <!-- Notiz: Auswahlfeld für die Kategorie -->
      <button type="submit">Speichern</button>
      <a href="index.php" class="button">Abbrechen</a>
      <!-- Notiz: Buttons zum Speichern oder Abbrechen -->
    </form>
  </main>
<?php include_once 'footer.php'; ?>
