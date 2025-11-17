<?php
require_once __DIR__ . '/../inc/notes_functions.php';

$notesFile = __DIR__ . '/../data/notes.json';
$notes = load_notes($notesFile);
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Notiz-Manager Light</title>
  <link rel="stylesheet" href="../style/style.css">
  <style>
    body { background: #f3f4f6; }
    .container { max-width: 600px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px #0002; }
    .notes-list { list-style: none; padding: 0; }
    .note-item { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; margin-bottom: 1rem; padding: 1rem 1.2rem; display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem; }
    .note-content { flex: 1; }
    .note-title { font-weight: bold; font-size: 1.1em; margin-bottom: 0.2em; }
    .note-text { color: #374151; }
    .note-delete { background: #ef4444; color: #fff; border: none; border-radius: 4px; padding: 0.3em 0.8em; cursor: pointer; font-size: 0.95em; margin-left: 1em; }
    .note-delete:hover { background: #b91c1c; }
    .add-form { display: flex; gap: 0.5rem; margin-top: 1.5rem; }
    .add-form input, .add-form textarea { padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px; font-size: 1em; }
    .add-form textarea { resize: vertical; min-width: 120px; min-height: 2.2em; }
    .add-form button { background: #2563eb; color: #fff; border: none; border-radius: 4px; padding: 0.5rem 1.2rem; cursor: pointer; font-size: 1em; }
    .add-form button:hover { background: #1d4ed8; }
    h1, h2 { margin-bottom: 1rem; }
  </style>
</head>
<body>
  <header><h1>Notiz-Manager Light</h1></header>
  <main class="container">
    <section>
      <h2>Notizen</h2>
      <ul class="notes-list">
        <?php foreach ($notes as $i => $note): ?>
          <li class="note-item">
            <div class="note-content">
              <div class="note-title"><?= htmlspecialchars($note->title) ?></div>
              <div class="note-text"><?= nl2br(htmlspecialchars($note->content)) ?></div>
            </div>
            <form action="delete.php" method="post">
              <input type="hidden" name="id" value="<?= $i ?>">
              <button type="submit" class="note-delete">Löschen</button>
            </form>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
    <section>
      <h2>Neue Notiz</h2>
      <form class="add-form" action="add.php" method="post">
        <input name="title" placeholder="Titel" required>
        <textarea name="content" placeholder="Inhalt" required></textarea>
        <button type="submit">Hinzufügen</button>
      </form>
    </section>
  </main>
</body>
</html>
