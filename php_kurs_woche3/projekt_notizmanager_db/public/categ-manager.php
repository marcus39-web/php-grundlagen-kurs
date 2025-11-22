<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * categ-manager.php - Kategorieverwaltung
 * 
 * Zeigt alle Kategorien in einer Tabelle an.
 * Ermöglicht das Hinzufügen, Bearbeiten und Löschen von Kategorien.
 * Zugriff für alle eingeloggten Benutzer.
 */
include_once 'header.php';

$categs = getAllCategories($pdo);

// Debug-Ausgabe: Kategorien direkt ausgeben
try {
    $result = $pdo->query('SELECT * FROM categories');
    $allCats = $result ? $result->fetchAll() : [];
    echo '<pre>Kategorien: ' . print_r($allCats, true) . '</pre>';
} catch (Exception $e) {
    echo '<pre>Fehler beim Kategorien-Query: ' . $e->getMessage() . '</pre>';
}
?>
  <main class="container">
    <section class="card">
      <h2>Neue Kategorie</h2>
      <form action="categories/add.php" method="post">
        <label>Kategorie-Name <input type="text" name="name" required></label>
        <button type="submit">Speichern</button>
      </form>
    </section>

    <section class="card">
      <h2>Einträge</h2>
      <table>
        <thead>
          <tr>
            <th>Kategorie</th>
            <th>Aktionen</th>
          </tr>
        </thead>
          <?php foreach ($categs as $c): ?>
            <tr>
              <td><?= safe($c->name) ?></td>
              <td>
                <a href="categories/edit.php?id=<?= (int)$c->id ?>" class="button">Bearbeiten</a>
                <form action="categories/delete.php" style="display:inline;" method="post">
                  <input type="hidden" name="id" value="<?= (int)$c->id ?>">
                  <button type="submit" class="button text-danger">Löschen</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <tbody>

        </tbody>
      </table>
    </section>
  </main>
<?php include_once 'footer.php'; ?>