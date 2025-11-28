<?php
// produkt_hinzufuegen.php: Produkt/Artikel hinzufügen mit Kategorie-Auswahl und Bild-Upload
require_once __DIR__ . '/db.inc.php';
session_start();

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';
$title = '';
$content = '';
$kategorie_id = '';

// Kategorien auslesen
$sql = 'SELECT * FROM tbl_kategorien ORDER BY kategorie_name ASC';
$stmt = $pdo->query($sql);
$kategorien = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $kategorie_id = isset($_POST['kategorie_id']) ? (int)$_POST['kategorie_id'] : '';
    $autor = $_SESSION['user'] ?? '';
    $bildname = '';
    // Kategorie ggf. neu anlegen
    if (!empty($_POST['neue_kategorie'])) {
        $neue_kategorie = trim($_POST['neue_kategorie']);
        if ($neue_kategorie !== '') {
            $sql = 'INSERT INTO tbl_kategorien (kategorie_name) VALUES (?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$neue_kategorie]);
            $kategorie_id = (int)$pdo->lastInsertId();
        }
    }
    // Bild-Upload
    if (!empty($_FILES['bild']['name'])) {
        $bildname = uniqid('img_') . '_' . basename($_FILES['bild']['name']);
        $ziel = __DIR__ . '/images/' . $bildname;
        if (!move_uploaded_file($_FILES['bild']['tmp_name'], $ziel)) {
            $error = 'Bild konnte nicht hochgeladen werden!';
        }
    }
    if ($title === '' || $content === '' || !$kategorie_id) {
        $error = 'Bitte alle Felder ausfüllen und eine Kategorie wählen!';
    } elseif (!$error) {
        $sql = 'INSERT INTO tbl_posts (posts_header, posts_content, posts_kategorie, posts_autor, posts_image, posts_created, posts_changed) VALUES (?, ?, ?, ?, ?, NOW(), NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content, $kategorie_id, $autor, $bildname]);
        $success = 'Produkt/Artikel wurde hinzugefügt!';
        $title = $content = '';
        $kategorie_id = '';
    }
}

require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
echo '<main class="container">';
echo '<section class="card" style="max-width:520px; margin:48px auto; padding:36px 36px 28px 36px;">';
echo '<h2 style="text-align:center; margin-bottom:28px; color:var(--primary); font-size:2rem; font-weight:700;">Produkt/Artikel hinzufügen</h2>';
if ($error) echo '<p class="alert text-danger" style="text-align:center; color:var(--danger); font-weight:600;">' . htmlspecialchars($error) . '</p>';
if ($success) echo '<p class="alert" style="color:green; text-align:center; font-weight:bold;">' . htmlspecialchars($success) . '</p>';
echo '<form method="post" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:18px;">';
echo '<div><label for="title" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Titel:</label><input type="text" name="title" id="title" required value="' . htmlspecialchars($title) . '" style="width:100%; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1rem;"></div>';
echo '<div><label for="content" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Inhalt:</label><textarea name="content" id="content" required style="width:100%; min-height:80px; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1rem;">' . htmlspecialchars($content) . '</textarea></div>';
echo '<div><label for="kategorie_id" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Kategorie:</label>';
echo '<select name="kategorie_id" id="kategorie_id" required style="width:100%; padding:10px; border:1.5px solid var(--primary); border-radius:8px; background:var(--bg); font-size:1rem;">';
echo '<option value="">Bitte wählen</option>';
foreach ($kategorien as $kat) {
    echo '<option value="' . $kat['kategorie_id'] . '"' . ($kategorie_id == $kat['kategorie_id'] ? ' selected' : '') . '>' . htmlspecialchars($kat['kategorie_name']) . '</option>';
}
echo '</select>';
echo '</div>';
echo '<div><label for="neue_kategorie" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Neue Kategorie anlegen:</label><input type="text" name="neue_kategorie" id="neue_kategorie" style="width:100%; padding:10px; border:1.5px solid var(--muted); border-radius:8px; background:var(--bg); font-size:1rem;"></div>';
echo '<div><label for="bild" style="font-weight:600; margin-bottom:6px; display:block; color:var(--primary);">Bild hochladen:</label><input type="file" name="bild" id="bild" accept="image/*" style="width:100%; padding:10px; border:1.5px solid var(--muted); border-radius:8px; background:var(--bg); font-size:1rem;"></div>';
echo '<div style="margin-top:18px; text-align:center;"><button type="submit" class="button" style="background:var(--primary); color:#fff; padding:12px 36px; border-radius:8px; font-size:1.08rem; font-weight:600; border:none; cursor:pointer;">Hinzufügen</button></div>';
echo '</form>';
echo '<div style="text-align:center; margin-top:28px;">';
echo '<a href="index.php" class="button" style="background:var(--muted); color:#fff; padding:10px 32px; border-radius:8px; font-size:1.08rem; font-weight:500; text-decoration:none; display:inline-block;">Zurück</a>';
echo '</div>';
echo '</section></main>';
require_once __DIR__ . '/inc/footer.inc.php';
