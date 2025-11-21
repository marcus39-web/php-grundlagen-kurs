<?php 
/**
 * Hauptseite der Notizenverwaltung
 * 
 * Funktionen:
 * - Formular zum Erstellen neuer Notizen mit Titel, Inhalt und Kategorie
 * - Tabellarische Auflistung aller Notizen des eingeloggten Benutzers
 * - Admin sieht alle Notizen aller Benutzer mit Username-Spalte
 * - Bearbeiten- und Löschen-Buttons für jede Notiz
 * - Kategorien-Dropdown aus der Datenbank
 */
include_once 'header.php';
$notes = getAllNotes($pdo);
?>
  <main class="container">
    <section class="card">
      <h2>Neue Notiz</h2>
      <form action="add.php" method="post">
        <label>Titel <input type="text" name="title" required></label>
        <label>Inhalt <textarea name="content" rows="10" required></textarea></label>
        <label>Kategorie
          <select name="category_id">
            <option value="" disabled selected>- keine -</option>
            <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat): ?>
              <option value="<?= (int)$cat->id ?>"><?= safe($cat->name) ?></option>
            <?php endforeach; ?>
          </select>
        </label>
        <button type="submit">Speichern</button>
      </form>
    </section>

    <section class="card">
      <h2>Einträge</h2>
      <table>
        <thead>
          <tr>
            <th>Titel</th>
            <th>Kategorie</th>
            <?php if(!empty($_SESSION['user']) && strtolower($_SESSION['user']) === 'admin'): ?>
              <th>Benutzer</th>
            <?php endif; ?>
            <th>Datum</th>
            <th>Aktionen</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($notes as $n): ?>
            <tr>
              <td><?= safe($n->title) ?></td>
              <td><?= $n->category ?></td>
              <?php if(!empty($_SESSION['user']) && strtolower($_SESSION['user']) === 'admin'): ?>
                <td><?= safe($n->username ?? 'Unbekannt') ?></td>
              <?php endif; ?>
              <td><?= safe($n->created_at) ?></td>
              <td>
                <a href="edit.php?id=<?= (int)$n->id ?>" class="button">Bearbeiten</a>
                <form action="delete.php" style="display:inline;" method="post">
                  <input type="hidden" name="id" value="<?= (int)$n->id ?>">
                  <button type="submit" class="button text-danger">Löschen</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
<?php include_once 'footer.php'; ?>