<?php
declare(strict_types=1);
$path = __DIR__ . "/notes.json";
$notes = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>JSON lesen</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<header><h1>JSON lesen</h1></header>
<main class="container">
  <?php if ($notes): ?>
    <?php foreach ($notes as $n): ?>
      <article class="post">
        <h2><?= htmlspecialchars($n["title"]) ?></h2>
        <p><?= nl2br(htmlspecialchars($n["content"])) ?></p>
      </article>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="alert">Keine Einträge gefunden. Bitte zuerst <code>beispiel_json_write.php</code> ausführen.</p>
  <?php endif; ?>
</main>
</body>
</html>
