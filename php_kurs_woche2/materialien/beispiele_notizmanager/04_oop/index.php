<?php
declare(strict_types=1);
require_once __DIR__ . '/class/Note.php';
error_reporting(E_ALL);
ini_set('display_errors', true);
$notes = [
  new Note('Erster Eintrag', 'OOP macht PHP strukturierter' ),
  new Note('Zweiter Eintrag', 'Klassen kapseln Daten & Verhalten')
]


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
  <?php foreach($notes as $n): ?>
    <article class="post">
      <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
      <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
    </article>
  <?php endforeach; ?>
</main>
</body>
</html>
