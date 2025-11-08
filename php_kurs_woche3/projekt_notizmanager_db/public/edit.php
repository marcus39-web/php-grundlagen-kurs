<?php
declare(strict_types=1);
require __DIR__ . '/../inc/db.php';
require __DIR__ . '/../inc/functions.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$note = $id ? findNote($pdo, $id) : null;
if (!$note) { header('Location: index.php'); exit; }
?><!doctype html><html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Eintrag bearbeiten</title>
<link rel="stylesheet" href="../style/style.css">
</head><body><main class="container">
  <h1>Eintrag bearbeiten</h1>
  <form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= (int)$note['id'] ?>">
    <label>Titel <input name="title" value="<?= safe($note['title']) ?>" required></label>
    <label>Inhalt <textarea name="content" rows="5" required><?= safe($note['content']) ?></textarea></label>
    <label>Kategorie
      <select name="category_id">
        <option value="">– keine –</option>
        <?php foreach ($pdo->query("SELECT id, name FROM categories ORDER BY name") as $cat): ?>
          <option value="<?= (int)$cat['id'] ?>" <?= ($note['category_id']??null)==$cat['id']?'selected':'' ?>><?= safe($cat['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <button>Speichern</button>
    <a class="button" href="index.php">Abbrechen</a>
  </form>
</main></body></html>
