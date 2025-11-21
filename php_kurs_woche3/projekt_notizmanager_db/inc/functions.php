<?php
declare(strict_types=1);

/**
 * Hilfsfunktion: HTML-Sonderzeichen escapen
 */
function safe(string $str): string {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Prüft, ob ein Benutzer eingeloggt ist
 */
function is_logged_in(): bool {
  return !empty($_SESSION['user']);
}

/**
 * Authentifizierung: Benutzername und Passwort prüfen
 */
function authenticate(PDO $pdo, string $username, string $password): bool {
  $stmt = $pdo->prepare('SELECT password_hash FROM users WHERE username = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  
  if ($user && password_verify($password, $user->password_hash)) {
    return true;
  }
  return false;
}

/**
 * Alle Notizen abrufen (mit Kategorie-Name via LEFT JOIN)
 */
function getAllNotes(PDO $pdo): array {
  $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name as category
          FROM notes n
          LEFT JOIN categories c ON n.category_id = c.id
          ORDER BY n.created_at DESC';
  return $pdo->query($sql)->fetchAll();
}

/**
 * Eine einzelne Notiz anhand der ID abrufen
 */
function getNoteById(PDO $pdo, int $id): ?object {
  $stmt = $pdo->prepare('SELECT * FROM notes WHERE id = ?');
  $stmt->execute([$id]);
  $result = $stmt->fetch();
  return $result ?: null;
}

/**
 * Neue Notiz hinzufügen
 */
function addNote(PDO $pdo, string $title, string $content, ?int $categoryId = null): bool {
  $stmt = $pdo->prepare('INSERT INTO notes (title, content, category_id) VALUES (?, ?, ?)');
  return $stmt->execute([$title, $content, $categoryId]);
}

/**
 * Notiz aktualisieren
 */
function updateNote(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null): bool {
  $stmt = $pdo->prepare('UPDATE notes SET title = ?, content = ?, category_id = ? WHERE id = ?');
  return $stmt->execute([$title, $content, $categoryId, $id]);
}

/**
 * Notiz löschen
 */
function deleteNote(PDO $pdo, int $id): bool {
  $stmt = $pdo->prepare('DELETE FROM notes WHERE id = ?');
  return $stmt->execute([$id]);
}

/**
 * Alle Kategorien abrufen
 */
function getAllCategories(PDO $pdo): array {
  return $pdo->query('SELECT * FROM categories ORDER BY name')->fetchAll();
}