<?php
declare(strict_types=1);
$score = 83;
$note = "";
if ($score >= 90) {
  $note = "Sehr gut";
} elseif ($score >= 75) {
  $note = "Gut";
} else {
  $note = "OK";
}
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>If/Else Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Kontrollstrukturen</h1></header>
  <main class="container">
    <p>Punkte: <?= $score ?> → Note: <strong class="<?= $note === 'Sehr gut' ? 'good' : ($note==='Gut'?'ok':'bad') ?>"><?= $note ?></strong></p>
  </main>
</body>
</html>
