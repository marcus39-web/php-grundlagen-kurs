<?php
declare(strict_types=1);
require __DIR__ . "/../inc/tools.php";
$path = __DIR__ . "/../data/notes.json";
$notes = loadNotes($path);
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Notiz‑Manager Light</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<header><h1>Notiz‑Manager Light</h1></header>
<main class="container">
  <section class="card">
    <h2>Neue Notiz</h2>
    <form method="post" action="add.php">
      <label>Titel
        <input name="title" required>
      </label>
      <label>Inhalt
        <textarea name="content" rows="4" required></textarea>
      </label>
      <button>Speichern</button>
    </form>
  </section>

  <section>
    <h2>Einträge</h2>
    <?php if (!$notes): ?>
      <p class="alert">Noch keine Notizen vorhanden.</p>
    <?php endif; ?>
    <?php foreach ($notes as $i => $n): ?>
      <article class="post">
        <h3><?= safe($n["title"] ?? "") ?></h3>
        <p><?= nl2br(safe($n["content"] ?? "")) ?></p>
        <form method="post" action="delete.php">
          <input type="hidden" name="idx" value="<?= (int)$i ?>">
          <button>Eintrag löschen</button>
        </form>
      </article>
    <?php endforeach; ?>
  </section>
</main>
</body>
</html>
