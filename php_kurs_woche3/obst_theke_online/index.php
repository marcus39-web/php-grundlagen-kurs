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
    <link rel="stylesheet" href="css/styles.css">
    <title>Obst Theke Online</title>
</head>
<body>
    <?php require_once __DIR__ . '/inc/header.inc.php'; ?>
    <?php require_once __DIR__ . '/inc/nav.inc.php'; ?>

    <main>
        <h2>Alle Blogposts</h2>
        <ul>
        <?php
        // Alle Posts mit Kategorie auslesen
        $sql = 'SELECT p.posts_id, p.posts_header, c.categ_name
                FROM tbl_posts p
                LEFT JOIN tbl_categories c ON p.posts_categ_id_ref = c.categ_id
                ORDER BY p.posts_created_at DESC';
        $stmt = $pdo->query($sql);
        foreach ($stmt as $row): ?>
            <li>
                <a href="post_single.php?post=<?= $row['posts_id'] ?>">
                    <?= htmlspecialchars($row['posts_header']) ?>
                </a>
                <span>(Kategorie: <?= htmlspecialchars($row['categ_name'] ?? 'Keine Kategorie') ?>)</span>
            </li>
        <?php endforeach; ?>
        </ul>
    </main>

    <?php require_once __DIR__ . '/inc/footer.inc.php'; ?>
</body>
</html>