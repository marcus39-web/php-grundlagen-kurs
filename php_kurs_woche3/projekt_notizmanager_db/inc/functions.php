<?php
declare(strict_types=1);
/**
 * functions.php – Hilfsfunktionen für Notiz-Manager
 *
 * Enthält alle Funktionen für:
 * - Authentifizierung und Benutzer-Management
 * - CRUD-Operationen für Notizen (mit User-Rechten)
 * - Kategorie-Verwaltung
 * - Security (XSS-Schutz via htmlspecialchars)
 */
// Notiz: Datei-Header und Kurzbeschreibung

/**
 * Hilfsfunktion: HTML-Sonderzeichen escapen
 */
function safe(string $str): string {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  // Notiz: Wandelt Zeichen in HTML-Entities um (XSS-Schutz)
}

/**
 * Prüft, ob ein Benutzer eingeloggt ist
 */
function is_logged_in(): bool {
  return !empty($_SESSION['user']);
  // Notiz: Gibt true zurück, wenn ein User eingeloggt ist
}

/**
 * Authentifizierung: Benutzername und Passwort prüfen
 */
function authenticate(PDO $pdo, string $username, string $password): bool {
  $stmt = $pdo->prepare('SELECT password_hash FROM users WHERE username = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  // Notiz: Holt den Passwort-Hash aus der Datenbank
  if ($user && password_verify($password, $user->password_hash)) {
    return true;
    // Notiz: Passwort stimmt überein
  }
  return false;
  // Notiz: Passwort stimmt nicht
}

/**
 * Alle Notizen abrufen (mit Kategorie-Name via LEFT JOIN)
 * Admin sieht alle Notizen, normale User nur ihre eigenen
 */
function getAllNotes(PDO $pdo): array {
  if (empty($_SESSION['user'])) {
    return [];
  }
  
  // Admin sieht alle Notizen
  if (strtolower($_SESSION['user']) === 'admin') {
    $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name as category, u.username
            FROM notes n
            LEFT JOIN categories c ON n.category_id = c.id
            LEFT JOIN users u ON n.user_id = u.id
            ORDER BY n.created_at DESC';
    return $pdo->query($sql)->fetchAll();
  }
  
  // User-ID ermitteln
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  $user = $stmt->fetch();
  
  if (!$user) {
    return [];
  }
  
  // Nur eigene Notizen
  $sql = 'SELECT n.id, n.title, n.content, n.created_at, c.name as category
          FROM notes n
          LEFT JOIN categories c ON n.category_id = c.id
          WHERE n.user_id = ?
          ORDER BY n.created_at DESC';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user->id]);
  return $stmt->fetchAll();
}

/**
 * Eine einzelne Notiz anhand der ID abrufen
 * Admin kann alle Notizen sehen, normale User nur ihre eigenen
 */
function getNoteById(PDO $pdo, int $id): ?object {
  if (empty($_SESSION['user'])) {
    return null;
  }
  
  // Admin kann alle Notizen sehen
  if (strtolower($_SESSION['user']) === 'admin') {
    $stmt = $pdo->prepare('SELECT * FROM notes WHERE id = ?');
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    return $result ?: null;
  }
  
  // User-ID ermitteln
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  $user = $stmt->fetch();
  
  if (!$user) {
    return null;
  }
  
  // Nur eigene Notizen
  $stmt = $pdo->prepare('SELECT * FROM notes WHERE id = ? AND user_id = ?');
  $stmt->execute([$id, $user->id]);
  $result = $stmt->fetch();
  return $result ?: null;
}

/**
 * Neue Notiz hinzufügen
 * Speichert automatisch die User-ID
 */
function addNote(PDO $pdo, string $title, string $content, ?int $categoryId = null): bool {
  if (empty($_SESSION['user'])) {
    return false;
  }
  
  // User-ID ermitteln
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  $user = $stmt->fetch();
  
  if (!$user) {
    return false;
  }
  
  $stmt = $pdo->prepare('INSERT INTO notes (user_id, title, content, category_id) VALUES (?, ?, ?, ?)');
  return $stmt->execute([$user->id, $title, $content, $categoryId]);
}

/**
 * Notiz aktualisieren
 * Admin kann alle bearbeiten, normale User nur ihre eigenen
 */
function updateNote(PDO $pdo, int $id, string $title, string $content, ?int $categoryId = null): bool {
  if (empty($_SESSION['user'])) {
    return false;
  }
  
  // Admin kann alle bearbeiten
  if (strtolower($_SESSION['user']) === 'admin') {
    $stmt = $pdo->prepare('UPDATE notes SET title = ?, content = ?, category_id = ? WHERE id = ?');
    return $stmt->execute([$title, $content, $categoryId, $id]);
  }
  
  // User-ID ermitteln
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  $user = $stmt->fetch();
  
  if (!$user) {
    return false;
  }
  
  // Nur eigene Notizen bearbeiten
  $stmt = $pdo->prepare('UPDATE notes SET title = ?, content = ?, category_id = ? WHERE id = ? AND user_id = ?');
  return $stmt->execute([$title, $content, $categoryId, $id, $user->id]);
}

/**
 * Notiz löschen
 * Admin kann alle löschen, normale User nur ihre eigenen
 */
function deleteNote(PDO $pdo, int $id): bool {
  if (empty($_SESSION['user'])) {
    return false;
  }
  
  // Admin kann alle löschen
  if (strtolower($_SESSION['user']) === 'admin') {
    $stmt = $pdo->prepare('DELETE FROM notes WHERE id = ?');
    return $stmt->execute([$id]);
  }
  
  // User-ID ermitteln
  $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
  $stmt->execute([$_SESSION['user']]);
  $user = $stmt->fetch();
  
  if (!$user) {
    return false;
  }
  
  // Nur eigene Notizen löschen
  $stmt = $pdo->prepare('DELETE FROM notes WHERE id = ? AND user_id = ?');
  return $stmt->execute([$id, $user->id]);
}

/**
 * Alle Kategorien abrufen
 */
function getAllCategories(PDO $pdo): array {
  return $pdo->query('SELECT * FROM categories ORDER BY name')->fetchAll();
}

/**
 * Gibt den aktuellen Benutzernamen zurück
 */
function current_user(): ?string {
  return $_SESSION['user'] ?? null;
}

/**
 * Verlangt Login - leitet zur Login-Seite weiter, wenn nicht eingeloggt
 */
function require_login(): void {
  if (!is_logged_in()) {
    header('Location: login.php');
    exit;
  }
}