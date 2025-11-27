<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/db.inc.php';

// Artikel-ID aus Query holen
$postId = isset($_GET['post']) ? (int)$_GET['post'] : 0;
if ($postId < 1) {
    echo '<p>Kein Artikel ausgewählt.</p>';
    exit;
}

// Artikel mit allen Infos auslesen
$sql = 'SELECT p.*, c.categ_name, u.users_forename, u.users_lastname
        FROM tbl_posts p
        LEFT JOIN tbl_categories c ON p.posts_categ_id_ref = c.categ_id
        LEFT JOIN tbl_users u ON p.posts_users_id_ref = u.users_id
        WHERE p.posts_id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$postId]);
$post = $stmt->fetch();

if (!$post) {
    echo '<p>Artikel nicht gefunden.</p>';
    exit;
}

// Bild-Upload verarbeiten
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['post_image'])) {
    $uploadDir = __DIR__ . '/images/';
    $fileName = basename($_FILES['post_image']['name']);
    $targetFile = $uploadDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if (in_array($fileType, $allowedTypes) && $_FILES['post_image']['size'] < 2*1024*1024) {
        if (move_uploaded_file($_FILES['post_image']['tmp_name'], $targetFile)) {
            // In DB speichern
            $sql = 'UPDATE tbl_posts SET posts_image = ? WHERE posts_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$fileName, $postId]);
            // Seite neu laden, damit Bild angezeigt wird
            header('Location: post_single.php?post=' . $postId);
            exit;
        } else {
            $uploadError = 'Fehler beim Hochladen.';
        }
    } else {
        $uploadError = 'Ungültiger Dateityp oder Datei zu groß.';
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['posts_header']) ?> - Artikelansicht</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body>
    <?php require_once __DIR__ . '/inc/header.inc.php'; ?>
    <?php require_once __DIR__ . '/inc/nav.inc.php'; ?>
    <main>
        <header>
            <h2><?= htmlspecialchars($post['posts_header']) ?></h2>
            <ul>
                <li>Autor: <?= htmlspecialchars($post['users_forename'] . ' ' . $post['users_lastname']) ?></li>
                <li>Kategorie: <?= htmlspecialchars($post['categ_name'] ?? 'Keine Kategorie') ?></li>
                <li>Erstellt: <?= htmlspecialchars($post['posts_created_at']) ?></li>
                <li>Geändert: <?= htmlspecialchars($post['posts_updated_at']) ?></li>
            </ul>
        </header>
        <section>
            <?php if (!empty($post['posts_image'])): ?>
                <img src="images/<?= htmlspecialchars($post['posts_image']) ?>" alt="Artikelbild" style="max-width:400px;">
            <?php endif; ?>
            <p><?= nl2br(htmlspecialchars($post['posts_content'])) ?></p>
            <hr>
            <button onclick="document.getElementById('uploadForm').style.display='block'">Bild hochladen</button>
            <form id="uploadForm" method="post" enctype="multipart/form-data" style="display:none;margin-top:10px;">
                <input type="file" name="post_image" accept="image/*" required>
                <button type="submit">Hochladen</button>
            </form>
            <?php if (!empty($uploadError)): ?>
                <p style="color:red;"><?= htmlspecialchars($uploadError) ?></p>
            <?php endif; ?>
        </section>
    </main>
    <?php require_once __DIR__ . '/inc/footer.inc.php'; ?>
</body>
</html>
