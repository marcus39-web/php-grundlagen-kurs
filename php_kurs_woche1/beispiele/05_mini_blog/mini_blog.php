<?php
declare(strict_types=1);
$posts = [
  ["title" => "Start", "author" => "Alex", "date" => date("d.m.Y"), "content" => "Willkommen zum Mini‑Blog!"],
  ["title" => "News", "author" => "Sam", "date" => date("d.m.Y", strtotime("-1 day")), "content" => "Heute: Schleifen und Arrays."],
];
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Mini‑Blog</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Mini‑Blog</h1></header>
  <main class="container">
    <?php foreach ($posts as $p): ?>
      <article class="post">
        <h2><?= htmlspecialchars($p["title"]) ?></h2>
        <p class="meta">von <?= htmlspecialchars($p["author"]) ?> · <?= htmlspecialchars($p["date"]) ?></p>
        <p><?= nl2br(htmlspecialchars($p["content"])) ?></p>
      </article>
    <?php endforeach; ?>
  </main>
</body>
</html>
