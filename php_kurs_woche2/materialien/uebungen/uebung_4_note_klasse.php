<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Definiere class Note (title, content, __construct).
 * 2) Erzeuge mehrere Objekte und gib sie in HTML aus.
 * 3) Optional: Lese Daten aus notes.json und wandle sie in Objekte um.
 */
class Note {
  public string $title;
  public string $content;

  public function __construct(string $title, string $content) {
    return $this->title = $title;
    $this->content = $content;
  }
}

// Notizen aus notes.json laden, falls vorhanden
$notes = [];
$jsonFile = __DIR__ . '/notes.json';
if (file_exists($jsonFile)) {
  $jsonData = file_get_contents($jsonFile);
  $data = json_decode($jsonData, true);
  if (is_array($data)) {
    foreach ($data as $item) {
      if (isset($item['title'], $item['content'])) {
        $notes[] = new Note($item['title'], $item['content']);
      }
    }
  }
}
// Fallback: Beispielnotizen, falls keine aus JSON geladen wurden
if (empty($notes)) {
  $notes = [
    new Note('Einkaufsliste', 'Milch, Brot, Butter'),
    new Note('ToDo', 'PHP-Übung abschließen'),
    new Note('Idee', 'Notiz-App mit PHP bauen')
  ];
}
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 4 – Note-Klasse</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 4 – Note-Klasse</h1></header>
  <main class="container">
    <section>
      <h2>Notizen</h2>
      <ul>
        <?php foreach ($notes as $note): ?>
          <li>
            <strong><?= htmlspecialchars($note->title) ?></strong><br>
            <span><?= nl2br(htmlspecialchars($note->content)) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>
</body>
</html>
