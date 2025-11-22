<?php
include_once '../header.php';
require_once '../../inc/db-connect.php';
require_once '../../inc/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
$stmt->execute([$id]);
$category = $stmt->fetch();
if(!$category) { header('Location: ../categ-manager.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name !== '') {
        $stmt = $pdo->prepare('UPDATE categories SET name = ? WHERE id = ?');
        $stmt->execute([$name, $id]);
        header('Location: ../categ-manager.php');
        exit;
    }
}
?>
<main class="container">
  <form action="edit.php?id=<?= (int)$category->id ?>" method="post">
    <label>Kategorie-Name <input type="text" name="name" value="<?= safe($category->name) ?>" required></label>
    <button type="submit">Speichern</button>
    <a href="../categ-manager.php" class="button">Abbrechen</a>
  </form>
</main>
<?php include_once '../footer.php'; ?>
