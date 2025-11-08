<?php
declare(strict_types=1);
$posts = [
  ["title" => "Erster Beitrag", "author" => "Alex", "content" => "Willkommen im Blog!"],
  ["title" => "Zweiter Beitrag", "author" => "Sam", "content" => "Heute lernen wir Arrays."],
];
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Arrays Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Beiträge aus Arrays</h1></header>
  <main class="container">
    <?php foreach ($posts as $p): ?>
      <article class="post">
        <h2><?= htmlspecialchars($p["title"]) ?></h2>
        <p class="meta">von <?= htmlspecialchars($p["author"]) ?></p>
        <p><?= nl2br(htmlspecialchars($p["content"])) ?></p>
      </article>
    <?php endforeach; ?>
  </main>
</body>
</html>
