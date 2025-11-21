<?php
declare(strict_types=1);

function getAllNotes(PDO $pdo):array {
  $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name AS category
    FROM notes n
    LEFT JOIN categories c
      ON c.id = n.category_id
    ORDER BY n.id DESC';
  
  return $pdo->query($sql)->fetchAll();
}

function safe(string $s): string {
  return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function addNote(PDO $pdo, string $title, string $content, ?int $categoryId = null):void {
  $stmt = $pdo->prepare('INSERT INTO notes(title, content, category_id) VALUES (:t, :c, :cat)');
  $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $categoryId]);
}

function findNote(PDO $pdo, int $id): ?object {
  $stmt = $pdo->prepare('SELECT * FROM notes WHERE id=:id');
  $stmt->execute([':id' => $id]);
  $row = $stmt->fetch();
  return $row ?: null;
}

function updateNote(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null):void {
  $stmt = $pdo->prepare('UPDATE notes SET title=:t, content=:c, category_id=:cat WHERE id=:id');
  $stmt->execute([':t'=>$title, ':c'=>$content, ':cat'=> $categoryId, ':id'=>$id]);
}

function deleteNote(PDO $pdo, int $id): void {
  $stmt = $pdo->prepare('DELETE FROM notes WHERE id=:id');
  $stmt->execute([':id'=>$id]);
}

function getAllCategories(PDO $pdo):array {
  $sql = 'SELECT c.id, c.name
    FROM categories c
    ORDER BY c.id DESC';
  
  return $pdo->query($sql)->fetchAll();
}

function addCategory(PDO $pdo, string $name):void {
  $stmt = $pdo->prepare('INSERT INTO categories(name) VALUES (:n)');
  $stmt->execute([':n' => $name]);
}

function findCategory(PDO $pdo, int $id): ?object {
  $stmt = $pdo->prepare('SELECT * FROM categories WHERE id=:id');
  $stmt->execute([':id' => $id]);
  $row = $stmt->fetch();
  return $row ?: null;
}

function updateCategory(PDO $pdo, int $id, string $name):void {
  $stmt = $pdo->prepare('UPDATE categories SET name=:n WHERE id=:id');
  $stmt->execute([':n'=>$name, ':id'=>$id]);
}

function deleteCategory(PDO $pdo, int $id): void {
  $stmt = $pdo->prepare('DELETE FROM categories WHERE id=:id');
  $stmt->execute([':id'=>$id]);
}

function authenticate(PDO $pdo, string $username, string $password): bool {
  $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE username=:u');
  $stmt->execute([':u'=> $username]);
  $row = $stmt->fetch();
  if(!$row) return false;
  return password_verify($password, $row->password_hash);
}

function current_user(): ?string {
  return isset($_SESSION['user']) && $_SESSION['user'] !== '' 
    ? (string)$_SESSION['user']
    : null;
}

function is_logged_in(): bool {
  return isset($_SESSION['user']) && $_SESSION['user'] !== '';
}

/**
 * Schützt eine Seite vor unbefugtem Zugriff
 * 
 * 
 */
function require_login(): void {
  if(!is_logged_in()) {
    header('Location: login.php');
    exit;
  }
}