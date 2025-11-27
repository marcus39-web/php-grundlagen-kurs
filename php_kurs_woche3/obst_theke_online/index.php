<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/db.inc.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tailwind.css">
    <title>Obst Theke Online</title>
    <style>
        body {
            background: url('/home/marcus/php-grundlagen-kurs/fruchtplatte.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .bg-overlay {
            background: rgba(255,255,255,0.8);
        }
        .bg-frucht {
            background: url('/home/marcus/php-grundlagen-kurs/fruchtplatte.jpg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.2;
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh; z-index: -1;
        }
    </style>
</head>
</body>
    <div class="bg-frucht"></div>
    <?php require_once __DIR__ . '/inc/header.inc.php'; ?>
    <?php require_once __DIR__ . '/inc/nav.inc.php'; ?>

    <main class="bg-overlay max-w-2xl mx-auto mt-10 p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Alle Blogposts</h2>
        <ul class="divide-y divide-gray-300">
        <?php
        // Alle Posts mit Kategorie auslesen
        $sql = 'SELECT p.posts_id, p.posts_header, c.categ_name
                FROM tbl_posts p
                LEFT JOIN tbl_categories c ON p.posts_categ_id_ref = c.categ_id
                ORDER BY p.posts_created_at DESC';
        $stmt = $pdo->query($sql);
        foreach ($stmt as $row): ?>
            <li class="py-4 flex items-center justify-between">
                <a href="post_single.php?post=<?= $row['posts_id'] ?>" class="text-blue-600 hover:underline font-semibold">
                    <?= htmlspecialchars($row['posts_header']) ?>
                </a>
                <span class="ml-4 px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-sm">Kategorie: <?= htmlspecialchars($row['categ_name'] ?? 'Keine Kategorie') ?></span>
            </li>
        <?php endforeach; ?>
        </ul>
    </main>

    <?php require_once __DIR__ . '/inc/footer.inc.php'; ?>
</body>
</html>