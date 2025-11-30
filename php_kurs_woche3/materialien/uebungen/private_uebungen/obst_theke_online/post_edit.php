<?php
// post_edit.php: Artikel bearbeiten oder löschen
require_once __DIR__ . '/db.inc.php';
session_start();

$postId = isset($_GET['post']) ? (int)$_GET['post'] : 0;
$action = $_GET['action'] ?? '';

if ($postId < 1 || empty($action)) {
    echo '<p>Ungültiger Aufruf.</p>';
    exit;
}

// Artikel auslesen
$sql = 'SELECT * FROM tbl_posts WHERE posts_id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$postId]);
$post = $stmt->fetch();
if (!$post) {
    echo '<p>Artikel nicht gefunden.</p>';
    exit;
}

// Löschen
if ($action === 'delete' && !empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Bild löschen
        if (!empty($post['posts_image'])) {
            $imgPath = __DIR__ . '/images/' . $post['posts_image'];
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
        $sql = 'DELETE FROM tbl_posts WHERE posts_id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$postId]);
        echo '<p class="alert" style="color:green;">Artikel wurde gelöscht.</p>';
        echo '<p><a href="index.php" class="button">Zurück zur Startseite</a></p>';
        exit;
    }
    require_once __DIR__ . '/inc/header.inc.php';
    require_once __DIR__ . '/inc/nav.inc.php';
    echo '<main class="container"><section class="card" style="max-width:400px; margin:48px auto;">';
    echo '<h2 style="text-align:center; margin-bottom:24px;">Artikel löschen</h2>';
    echo '<p>Möchten Sie den Artikel <strong>' . htmlspecialchars($post['posts_header']) . '</strong> wirklich löschen?</p>';
    echo '<form method="post" style="text-align:center; margin-top:24px;"><button type="submit" class="button" style="background:var(--danger); color:#fff;">Löschen</button></form>';
    echo '<p style="text-align:center; margin-top:24px;"><a href="index.php" class="button">Abbrechen</a></p>';
    echo '</section></main>';
    require_once __DIR__ . '/inc/footer.inc.php';
    exit;
}

// Bearbeiten
if ($action === 'edit' && !empty($_SESSION['user'])) {
    $error = '';
    $success = '';
    $title = $post['posts_header'];
    $content = $post['posts_content'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        if ($title === '' || $content === '') {
            $error = 'Bitte alle Felder ausfüllen!';
        } else {
            $sql = 'UPDATE tbl_posts SET posts_header = ?, posts_content = ? WHERE posts_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$title, $content, $postId]);
            $success = 'Artikel wurde gespeichert!';
        }
    }
    require_once __DIR__ . '/inc/header.inc.php';
    require_once __DIR__ . '/inc/nav.inc.php';
    echo '<main class="container">';
    echo '<section class="card" style="max-width:500px; margin:48px auto; padding:36px 36px 28px 36px; box-shadow:0 4px 24px #e5e7eb; border:1.5px solid var(--border); border-radius:12px;">';
    echo '<h2 style="text-align:center; margin-bottom:28px; font-size:2.1rem; font-weight:700; color:var(--primary); letter-spacing:0.5px;">Artikel bearbeiten</h2>';
    if ($error) echo '<p class="alert text-danger" style="text-align:center; margin-bottom:16px; color:var(--danger); font-weight:600;">' . htmlspecialchars($error) . '</p>';
    if ($success) echo '<p class="alert" style="color:green; text-align:center; font-weight:bold;">' . htmlspecialchars($success) . '</p>';
    if (!empty($post['posts_image'])) {
        echo '<div style="text-align:center; margin-bottom:18px;">';
        echo '<img src="images/' . htmlspecialchars($post['posts_image']) . '" alt="Artikelbild" style="max-width:220px; max-height:180px; border-radius:8px; box-shadow:0 2px 8px #e5e7eb;">';
        echo '</div>';
    }
    echo '<form method="post" style="display:flex; flex-direction:column; gap:22px;">';
    echo '<div><label for="title" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Titel:</label><input type="text" name="title" id="title" required value="' . htmlspecialchars($title) . '" class="input" style="width:100%; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1.08rem; transition:border 0.2s; outline:none;"></div>';
    echo '<div><label for="content" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Inhalt:</label><textarea name="content" id="content" required class="input" style="width:100%; min-height:90px; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1.08rem; transition:border 0.2s; outline:none;">' . htmlspecialchars($content) . '</textarea></div>';
    echo '<div style="display:flex; justify-content:center; margin-top:8px;">';
    echo '<button type="submit" class="button" style="background:var(--primary); color:#fff; padding:12px 36px; border-radius:8px; font-size:1.08rem; font-weight:600; border:none; cursor:pointer; box-shadow:0 2px 8px #2563eb33; transition:background 0.2s;">Speichern</button>';
    echo '</div>';
    echo '</form>';
    echo '<div style="text-align:center; margin-top:28px;">';
    echo '<a href="index.php" class="button" style="background:var(--muted); color:#fff; padding:12px 36px; border-radius:8px; font-size:1.08rem; font-weight:500; text-decoration:none; display:inline-block;">Zurück</a>';
    echo '</div>';
    echo '</section></main>';
    require_once __DIR__ . '/inc/footer.inc.php';
    exit;
}

// Fallback
require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
echo '<main class="container"><section class="card" style="max-width:400px; margin:48px auto;">';
echo '<h2 style="text-align:center; margin-bottom:24px;">Aktion nicht erlaubt</h2>';
echo '<p>Sie sind nicht berechtigt, diese Aktion auszuführen.</p>';
echo '<p style="text-align:center; margin-top:24px;"><a href="index.php" class="button">Zurück zur Startseite</a></p>';
echo '</section></main>';
require_once __DIR__ . '/inc/footer.inc.php';
