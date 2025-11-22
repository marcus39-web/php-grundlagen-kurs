<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * categ-manager.php – Kategorieverwaltung
 *
 * Zeigt alle Kategorien in einer Tabelle an.
 * Ermöglicht das Hinzufügen, Bearbeiten und Löschen von Kategorien.
 * Zugriff für alle eingeloggten Benutzer.
 */
// Notiz: Datei-Header und Funktionsbeschreibung

include_once 'header.php';
// Notiz: Bindet das Header-Template ein

$categs = getAllCategories($pdo);
// Notiz: Holt alle Kategorien aus der Datenbank

// Debug-Ausgabe entfernt – stattdessen strukturierte Darstellung

?>
<main class="container">
  <!-- Notiz: Hauptbereich für die Kategorieverwaltung -->
  <section class="card">
    <h2>Neue Kategorie</h2>
    <!-- Notiz: Überschrift für das Formular zum Hinzufügen einer Kategorie -->
    <form action="categories/add.php" method="post">
      <label>Kategorie-Name
        <input type="text" name="name" required>
        <!-- Notiz: Eingabefeld für den Namen der neuen Kategorie -->
      </label>
      <button type="submit">Speichern</button>
      <!-- Notiz: Button zum Speichern der neuen Kategorie -->
    </form>
  </section>

  <section class="card">
    <h2>Kategorien</h2>
    <!-- Notiz: Überschrift für die Kategorienliste -->
    <table>
      <thead>
        <tr>
          <th>Kategorie</th>
          <th>Aktionen</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categs as $c): ?>
          <tr>
            <td><?= safe($c->name) ?></td>
            <!-- Notiz: Zeigt den Namen der Kategorie -->
            <td>
              <a href="categories/edit.php?id=<?= (int)$c->id ?>" class="button">Bearbeiten</a>
              <!-- Notiz: Link zum Bearbeiten der Kategorie -->
              <form action="categories/delete.php" style="display:inline;" method="post">
                <input type="hidden" name="id" value="<?= (int)$c->id ?>">
                <!-- Notiz: Verstecktes Feld mit der Kategorie-ID -->
                <button type="submit" class="button text-danger">Löschen</button>
                <!-- Notiz: Button zum Löschen der Kategorie -->
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>
<?php include_once 'footer.php'; ?>
