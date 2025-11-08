<?php
declare(strict_types=1);
require __DIR__ . "/class/Note.php";
$notes = [
  new Note("Erster Eintrag", "OOP macht PHP strukturierter."),
  new Note("Zweiter Eintrag", "Klassen kapseln Daten & Verhalten."),
];
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>OOP Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<header><h1>OOP – Klasse Note</h1></header>
<main class="container">
  <?php foreach ($notes as $n): ?>
    <article class="post">
      <h2><?= htmlspecialchars($n->title) ?></h2>
      <p><?= nl2br(htmlspecialchars($n->content)) ?></p>
    </article>
  <?php endforeach; ?>
</main>
</body>
</html>
