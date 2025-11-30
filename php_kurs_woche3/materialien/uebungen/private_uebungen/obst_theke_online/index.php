<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once __DIR__ . '/db.inc.php';

$loginForm = function($error = '') {
    return '<section class="bg-white rounded-2xl shadow p-8 mb-8 max-w-md mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>' .
        ($error ? '<p class="text-red-600 text-center mb-4">' . htmlspecialchars($error) . '</p>' : '') .
        '<form method="post" class="space-y-4">
            <div>
                <label class="block font-semibold mb-1">E-Mail:</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            </div>
            <div>
                <label class="block font-semibold mb-1">Passwort:</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            </div>
            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 font-semibold">Login</button>
            </div>
        </form>
    </section>';
};
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/steyes.css">
    <title>Obst-Theke-online</title>
</head>
<body>
    <?php require_once __DIR__ . '/inc/header.inc.php'; ?>
    <?php require_once __DIR__ . '/inc/nav.inc.php'; ?>
    <main class="container">
        <section class="card" style="max-width:600px; margin:32px auto;">
            <h2 style="text-align:center; margin-bottom:24px;">Willkommen bei Obst-Theke-online</h2>
            <?php if (!empty($_SESSION['user'])): ?>
                <p class="alert" style="color:green; text-align:center; font-weight:bold;">Registrierung und Login erfolgreich!<br>Willkommen, <?= htmlspecialchars($_SESSION['user']['forename']) ?>!</p>
            <?php endif; ?>
        </section>
        <section class="card" style="max-width:600px; margin:32px auto;">
            <h2 style="text-align:center; margin-bottom:24px;">Alle Blogposts</h2>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:var(--bg);">
                        <th style="text-align:left; padding:8px;">Titel</th>
                        <th style="text-align:left; padding:8px;">Kategorie</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = 'SELECT p.posts_id, p.posts_header, c.categ_name
                        FROM tbl_posts p
                        LEFT JOIN tbl_categories c ON p.posts_categ_id_ref = c.categ_id
                        ORDER BY p.posts_created_at DESC';
                $stmt = $pdo->query($sql);
                foreach ($stmt as $row): ?>
                    <tr>
                        <td style="padding:8px; border-bottom:1px solid var(--border);">
                            <a href="post_single.php?post=<?= $row['posts_id'] ?>" style="font-weight:bold; color:var(--primary); text-decoration:none;">
                                <?= htmlspecialchars($row['posts_header']) ?>
                            </a>
                            <?php if (!empty($_SESSION['user'])): ?>
                                <span style="margin-left:12px;">
                                    <a href="post_edit.php?post=<?= $row['posts_id'] ?>&action=edit" style="color:var(--primary); text-decoration:underline; font-size:0.95em;">Bearbeiten</a>
                                    |
                                    <a href="post_edit.php?post=<?= $row['posts_id'] ?>&action=delete" style="color:var(--danger); text-decoration:underline; font-size:0.95em;">Löschen</a>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td style="padding:8px; border-bottom:1px solid var(--border);">
                            <?= htmlspecialchars($row['categ_name'] ?? 'Keine Kategorie') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php require_once __DIR__ . '/inc/footer.inc.php'; ?>
</body>
</html>