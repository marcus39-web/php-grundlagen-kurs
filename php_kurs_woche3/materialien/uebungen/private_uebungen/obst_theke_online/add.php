<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
require_once __DIR__ . '/db.inc.php';


function is_logged_in() {
  return !empty($_SESSION['user']);
}

function addNote($pdo, $title, $content, $catId, $comment) {
  $userId = $_SESSION['user']['id'] ?? null;
  if (!$userId) return false;
  $sql = 'INSERT INTO tbl_posts (posts_users_id_ref, posts_categ_id_ref, posts_header, posts_content, posts_comment) VALUES (?, ?, ?, ?, ?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $userId,
    $catId,
    $title,
    $content,
    $comment
  ]);
  return $pdo->lastInsertId();
}

if (!is_logged_in()) {
  header('Location: login.php');
  exit;
}
// Erfolgsmeldung
$success = '';
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cat = $_POST['category_id'] ?? '';
$catId = ($cat === '' ? null : (int)$cat);
$comment = trim($_POST['comment'] ?? '');
if ($title !== '' && $content !== '' && $comment !== '') {
  addNote($pdo, $title, $content, $catId, $comment);
  $success = 'Die Notiz wurde erfolgreich gespeichert!';
  // Optional: Felder leeren
  $title = $content = $comment = '';
}
require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
?>
<main class="container">
  <section class="card" style="max-width:480px; margin:48px auto;">
    <h2 style="text-align:center; margin-bottom:24px;">Neue Notiz/Bild anlegen</h2>
    <?php if (!empty($success)): ?>
      <p class="alert" style="color:green; text-align:center; font-weight:bold; margin-bottom:16px;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
      <div style="margin-bottom:16px;">
        <label for="title" style="font-weight:600; margin-bottom:6px; display:block;">Titel:</label>
        <input type="text" name="title" id="title" required>
      </div>
      <div style="margin-bottom:16px;">
        <label for="content" style="font-weight:600; margin-bottom:6px; display:block;">Inhalt:</label>
        <textarea name="content" id="content" required style="min-height:80px;"></textarea>
      </div>
      <div style="margin-bottom:16px;">
        <label for="category_id" style="font-weight:600; margin-bottom:6px; display:block;">Kategorie:</label>
      <select name="category_id">
        <?php
        $cats = $pdo->query('SELECT categ_id, categ_name FROM tbl_categories ORDER BY categ_name ASC');
        foreach ($cats as $catRow): ?>
          <option value="<?= $catRow['categ_id'] ?>"><?= htmlspecialchars($catRow['categ_name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <label>Kommentar/Beschreibung:</label>
      <input type="text" name="comment" required>
    </div>
    <div>
      <label>Bild hochladen:</label>
      <input type="file" name="image" accept="image/*">
    </div>
    <div>
      <button type="submit">Speichern</button>
    </div>
  </form>
</main>
<?php require_once __DIR__ . '/inc/footer.inc.php'; ?>