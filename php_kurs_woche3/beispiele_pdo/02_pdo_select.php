<?php
declare(strict_types=1);
$pdo = new PDO('mysql:host=localhost;dbname=notizmanager;charset=utf8mb4', 'user', 'pass', [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$rows = $pdo->query("SELECT id, title, created_at FROM notes ORDER BY id DESC")->fetchAll();
?><!doctype html><html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>PDO SELECT</title>
<link rel="stylesheet" href="../projekt_notizmanager_db/style/style.css">
</head><body><main class="container">
<h1>PDO SELECT</h1>
<table>
  <thead><tr><th>ID</th><th>Titel</th><th>Datum</th></tr></thead>
  <tbody>
    <?php foreach ($rows as $r): ?>
      <tr><td><?= (int)$r['id'] ?></td><td><?= htmlspecialchars($r['title']) ?></td><td><?= htmlspecialchars($r['created_at']) ?></td></tr>
    <?php endforeach; ?>
  </tbody>
</table>
</main></body></html>
