<?php
include_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$note = $id ? findNote($pdo, $id) : null;
if(!$note) { header('Location: index.php'); exit; }
?>

  <main class="container">
    <form action="update.php" method="post">
      <input type="hidden" name="id" value="<?= (int)$note->id ?>">
      <label>Titel <input type="text" name="title" value="<?= safe($note->title) ?>" required></label>
      <label>Inhalt <textarea name="content" rows="10" required><?= nl2br(safe($note->content)) ?></textarea></label>
      <label>Kategorie
        <select name="category_id">
          <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat): ?>
            <option value="<?= (int)$cat->id ?>" <?= ($note->category_id ?? null) == $cat->id ? 'selected' : '' ?> ><?= safe($cat->name) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <button type="submit">Speichern</button>
      <a href="index.php" class="button">Abbrechen</a>
    </form>
  </main>
<?php include_once 'footer.php'; ?>