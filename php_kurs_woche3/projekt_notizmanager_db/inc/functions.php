<?php
declare(strict_types=1);
function safe(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

function getAllNotes(PDO $pdo): array {
  return $pdo->query("SELECT n.id, n.title, n.content, n.created_at, c.name AS category
                      FROM notes n LEFT JOIN categories c ON c.id = n.category_id
                      ORDER BY n.id DESC")->fetchAll();
}
function addNote(PDO $pdo, string $title, string $content, ?int $categoryId = null): void {
  $stmt = $pdo->prepare("INSERT INTO notes(title, content, category_id) VALUES (:t, :c, :cat)");
  $stmt->execute([':t'=>$title, ':c'=>$content, ':cat'=>$categoryId]);
}
function findNote(PDO $pdo, int $id): ?array {
  $stmt = $pdo->prepare("SELECT * FROM notes WHERE id=:id");
  $stmt->execute([':id'=>$id]);
  $row = $stmt->fetch();
  return $row ?: null;
}
function updateNote(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null): void {
  $stmt = $pdo->prepare("UPDATE notes SET title=:t, content=:c, category_id=:cat WHERE id=:id");
  $stmt->execute([':t'=>$title, ':c'=>$content, ':cat'=>$categoryId, ':id'=>$id]);
}
function deleteNote(PDO $pdo, int $id): void {
  $stmt = $pdo->prepare("DELETE FROM notes WHERE id=:id");
  $stmt->execute([':id'=>$id]);
}

function authenticate(PDO $pdo, string $username, string $password): bool {
  $stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE username=:u");
  $stmt->execute([':u'=>$username]);
  $row = $stmt->fetch();
  if (!$row) return false;
  return password_verify($password, $row['password_hash']);
}
