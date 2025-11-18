<?php
declare(strict_types=1);
require_once __DIR__ . '/class/Note.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

$notes = [
  new Note(1, 'Erster Eintrag', 'OOP macht PHP strukturierter' ),
  new Note(2, 'Zweiter Eintrag', 'Klassen kapseln Daten & Verhalten'),
  new Note(3, 'Dritter Eintrag', 'Eigenschaften einer Klasse haben in der Regel die Sichtbarkeit <code>private</code>'),

];

$newNote = new Note( 4, 'Vierter Eintrag', 'Objekte lassen sich klonen');

$clonedNote = clone $newNote;

$copiedNote = Note::makeCopy($newNote, 6, 'Sechster Eintrag', 'Dieser Eintrag wurde kopiert');

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

<p><?php echo $notes[1]; ?></p>

<p><?php echo $newNote; ?></p>
<p><?php echo $clonedNote; ?></p>
<p><?php echo $copiedNote; ?></p>
</main>
</body>
</html>
