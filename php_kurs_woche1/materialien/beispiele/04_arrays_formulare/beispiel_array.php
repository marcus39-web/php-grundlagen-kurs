<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
// indizierte Arrays
$posts = ['Post 1', 'Post 2', 'Post 3'];
$cities = array(
  'Leipzig',
  'Nordhausen',
  'Erfurt'
);

// assoziative Arrays
$maincities = array(
  'Schweiz' => 'Bern',
  'Frankreich' => 'Paris',
  'Deutschland' => 'Berlin'
);

// mehrdimensionale Arrays
$posts2 = array(
  array(
    'title' => 'Erster Beitrag',
    'author' => 'Alex',
    'content' => 'Willkommen im Blog!'
  ),
  array(
    'title' => 'Zweiter Beitrag',
    'author' => 'Sam',
    'content' => 'Heute lernen wir Arrays.'
  ),
);

// Arrays für tabellarische Ausgaben
$laender = array(
  'Spanien' => array(
    'Hauptstadt' => 'Madrid',
    'Sprache' => 'spanisch',
    'Waehrung' => 'Euro',
    'Flaeche' => 504645
  ),
  'England' => array(
    'Hauptstadt' => 'London',
    'Sprache' => 'englisch',
    'Waehrung' => 'Pfund Sterling',
    'Flaeche' => 130395
  ),
  'Portugal' => array(
    'Hauptstadt' => 'Lissabon',
    'Sprache' => 'portugiesisch',
    'Waehrung' => 'Euro',
    'Flaeche' => 92345
  )
);
?>
<!doctype html>
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
    <?php foreach ($posts as $post): ?>
      <p><?= $post ?></p>
    <?php endforeach; ?>

    <p>Zweite Stadt im Array der Städte: <?= $cities[1]; ?></p>

    <?php $country = 'Deutschland'; ?>

    <p>Die Hauptstadt von <?= $country ?> ist <?= $maincities[$country] ?></p>

    <?php foreach ($maincities as $country => $city): ?>
      <p><?= $country ?>: <?= $city ?> </p>
    <?php endforeach; ?>

    <h2>Unsere aktuellen Beiträge</h2>

    <?php foreach ($posts2 as $p): ?>
      <article class="post">
        <h3><?= htmlspecialchars($p['title']) ?></h3>
        <p class="meta">von <?= htmlspecialchars($p['author']) ?></p>
        <p><?= nl2br(htmlspecialchars($p['content'])) ?></p>
      </article>
    <?php endforeach; ?>

    <h2>Informationen zu Ländern</h2>

    <table>
      <tr>
        <th>Land</th>
        <th>Hauptstadt</th>
        <th>Sprache</th>
        <th>Währung</th>
        <th>Fläche</th>
      </tr>
      <?php foreach( $laender as $land => $infos ): ?>
        <!-- äußere Schleife für die Zeilen und das Land -->
         <tr>
          <td><?= $land ?></td>

          <!-- innere Schleife für die Info-Zellen -->
          <?php foreach( $infos as $info ): ?>
            <td><?= $info ?></td>
          <?php endforeach; ?>
         </tr>
         
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>