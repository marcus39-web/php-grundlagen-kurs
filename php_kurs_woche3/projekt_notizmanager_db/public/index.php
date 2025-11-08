<?php
declare(strict_types=1);
session_start();
require __DIR__ . '/../inc/db.php';
require __DIR__ . '/../inc/functions.php';

$notes = getAllNotes($pdo);
?><!doctype html><html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Notiz‑Manager DB</title>
<link rel="stylesheet" href="../style/style.css">
</head><body>
<header><div class="container"><h1>Notiz‑Manager DB</h1>
  <div class="text-muted">
    <?php if (!empty($_SESSION['user'])): ?>
      Eingeloggt als <strong><?= safe($_SESSION['user']) ?></strong> – <a class="button" href="logout.php">Logout</a>
    <?php else: ?>
      <a class="button" href="login.php">Login</a>
    <?php endif; ?>
  </div>
</div></header>

<main class="container">
  <section class="card">
    <h2>Neue Notiz</h2>
    <form method="post" action="add.php">
      <label>Titel <input name="title" required></label>
      <label>Inhalt <textarea name="content" rows="4" required></textarea></label>
      <label>Kategorie
        <select name="category_id">
          <option value="">– keine –</option>
          <?php foreach ($pdo->query("SELECT id, name FROM categories ORDER BY name") as $cat): ?>
            <option value="<?= (int)$cat['id'] ?>"><?= safe($cat['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <button>Speichern</button>
    </form>
  </section>

  <section class="card">
    <h2>Einträge</h2>
    <table>
      <thead><tr><th>Titel</th><th>Kategorie</th><th>Datum</th><th>Aktionen</th></tr></thead>
      <tbody>
        <?php foreach ($notes as $n): ?>
          <tr>
            <td><?= safe($n['title']) ?></td>
            <td><?= safe($n['category'] ?? '–') ?></td>
            <td><?= safe($n['created_at']) ?></td>
            <td>
              <a class="button" href="edit.php?id=<?= (int)$n['id'] ?>">Bearbeiten</a>
              <form style="display:inline" method="post" action="delete.php" onsubmit="return confirm('Wirklich löschen?')">
                <input type="hidden" name="id" value="<?= (int)$n['id'] ?>">
                <button class="text-danger">Löschen</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>
</body></html>
