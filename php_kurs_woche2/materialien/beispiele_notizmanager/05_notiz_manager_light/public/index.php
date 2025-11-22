<?php
declare(strict_types=1);

?>
<!doctype html>
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
    
  </section>
</main>
</body>
</html>
