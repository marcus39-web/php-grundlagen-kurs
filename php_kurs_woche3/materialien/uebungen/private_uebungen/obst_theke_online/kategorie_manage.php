<?php
// kategorie_manage.php: Kategorien erstellen und löschen
require_once __DIR__ . '/db.inc.php';
session_start();

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Kategorie erstellen
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_kategorie'])) {
    $name = trim($_POST['new_kategorie']);
    if ($name === '') {
        $error = 'Bitte einen Namen für die Kategorie angeben!';
    } else {
        $sql = 'INSERT INTO tbl_categories (categ_name) VALUES (?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name]);
        $success = 'Kategorie wurde hinzugefügt!';
    }
}

// Kategorie löschen
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delId = (int)$_GET['delete'];
    $sql = 'DELETE FROM tbl_categories WHERE categ_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$delId]);
    $success = 'Kategorie wurde gelöscht!';
}

// Alle Kategorien auslesen
$sql = 'SELECT * FROM tbl_categories ORDER BY categ_name ASC';
$stmt = $pdo->query($sql);
$kategorien = $stmt->fetchAll();

require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
echo '<main class="container">';
echo '<section class="card" style="max-width:500px; margin:48px auto; padding:36px 36px 28px 36px;">';
echo '<h2 style="text-align:center; margin-bottom:28px; color:var(--primary); font-size:2rem; font-weight:700;">Kategorien verwalten</h2>';
if ($error) echo '<p class="alert text-danger" style="text-align:center; color:var(--danger); font-weight:600;">' . htmlspecialchars($error) . '</p>';
if ($success) echo '<p class="alert" style="color:green; text-align:center; font-weight:bold;">' . htmlspecialchars($success) . '</p>';
echo '<form method="post" style="display:flex; flex-direction:column; align-items:center; gap:16px; margin-bottom:24px;">';
echo '<input type="text" name="new_kategorie" placeholder="Neue Kategorie" required style="width:80%; max-width:320px; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1rem; margin-bottom:8px;">';
echo '<button type="submit" class="button" style="width:80%; max-width:320px; background:var(--primary); color:#fff; padding:12px 0; border-radius:8px; font-size:1.08rem; font-weight:600; border:none; cursor:pointer;">Hinzufügen</button>';
echo '</form>';
if (count($kategorien)) {
    echo '<ul style="list-style:none; padding:0; margin:0;">';
    foreach ($kategorien as $kat) {
        echo '<li style="display:flex; align-items:center; justify-content:space-between; padding:8px 0; border-bottom:1px solid var(--border);">';
        echo '<span style="font-size:1.08rem;">' . htmlspecialchars($kat['kategorie_name']) . '</span>';
        echo '<a href="?delete=' . $kat['kategorie_id'] . '" class="button" style="background:var(--danger); color:#fff; padding:6px 18px; border-radius:6px; font-size:0.98rem; font-weight:500; text-decoration:none;">Löschen</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p style="text-align:center; color:var(--muted);">Keine Kategorien vorhanden.</p>';
}
echo '<div style="text-align:center; margin-top:32px;">';
echo '<a href="index.php" class="button" style="background:var(--muted); color:#fff; padding:10px 32px; border-radius:8px; font-size:1.08rem; font-weight:500; text-decoration:none; display:inline-block;">Zurück</a>';
echo '</div>';
echo '</section></main>';
require_once __DIR__ . '/inc/footer.inc.php';
