<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'artikel.inc.php';
/**
 * Aufgabe:
 * 1) Lege ein $posts-Array mit mind. 3 Beiträgen an.
 * 2) Zeige Titel, Autor, Datum, Inhalt an.
 * 3) Bonus: Eigene Formatierungsfunktion verwenden.
 */

/**
 * Formatiert einen Blog-Post als HTML
 * @param array $post Der Blog-Post mit titel, autor, datum, inhalt
 * @return string Formatierter HTML-String
 */
function formatPost(array $post): string {
    $titel = htmlspecialchars($post['titel']);
    $autor = htmlspecialchars($post['autor']);
    $datum = htmlspecialchars($post['datum']);
    $inhalt = nl2br(htmlspecialchars($post['inhalt']));
    
    return "
    <article class='blog-post'>
        <h2>$titel</h2>
        <div class='meta'>
            <span class='autor'>✍️ $autor</span>
            <span class='datum'>📅 $datum</span>
        </div>
        <div class='inhalt'>
            $inhalt
        </div>
    </article>
    ";
}

// Blog-Posts Array
$posts = [
    [
        'titel' => 'Mein erster PHP-Blog-Post',
        'autor' => 'Marcus',
        'datum' => '15.11.2025',
        'inhalt' => 'Heute habe ich meinen ersten Blog-Post mit PHP erstellt. Es macht richtig Spaß, mit Arrays zu arbeiten und dynamische Inhalte zu generieren!'
    ],
    [
        'titel' => 'PHP Arrays sind großartig',
        'autor' => 'Anna Müller',
        'datum' => '14.11.2025',
        'inhalt' => 'Arrays in PHP sind sehr vielseitig. Man kann sie für Listen, assoziative Daten und sogar mehrdimensionale Strukturen verwenden. Ein mächtiges Werkzeug!'
    ],
    [
        'titel' => 'Funktionen in PHP',
        'autor' => 'Tom Schmidt',
        'datum' => '13.11.2025',
        'inhalt' => 'Funktionen helfen dabei, Code wiederverwendbar zu machen. Mit type hints und return types wird der Code noch sicherer und besser lesbar.'
    ]
];
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 6 – Mini‑Blog</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 6 – Mini‑Blog</h1></header>
  <main class="container">
    
    <div class="blog-header">
      <p>Willkommen auf meinem Mini-Blog! 🚀</p>
      <p class="post-count">Insgesamt <?= count($posts); ?> Beiträge</p>
    </div>
    
    <?php foreach ($posts as $post): ?>
      <?= formatPost($post); ?>
    <?php endforeach; ?>
    
  </main>
  
  <style>
    .blog-header {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
      text-align: center;
    }
    .blog-header p {
      margin: 5px 0;
      font-size: 18px;
    }
    .post-count {
      color: #666;
      font-size: 14px;
    }
    .blog-post {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 25px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .blog-post h2 {
      margin-top: 0;
      color: #333;
      border-bottom: 2px solid #007bff;
      padding-bottom: 10px;
    }
    .meta {
      display: flex;
      gap: 20px;
      margin: 15px 0;
      font-size: 14px;
      color: #666;
    }
    .meta span {
      display: inline-block;
    }
    .inhalt {
      line-height: 1.6;
      color: #444;
      margin-top: 15px;
    }
  </style>
</body>
</html>
