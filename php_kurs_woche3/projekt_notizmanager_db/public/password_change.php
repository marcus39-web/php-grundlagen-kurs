<?php
/**
 * password_change.php - Passwort ändern
 * 
 * Ermöglicht eingeloggten Benutzern das Ändern ihres Passworts.
 * Validiert das aktuelle Passwort vor der Änderung.
 * Mindestanforderungen: 8 Zeichen für neues Passwort.
 * Passwörter werden mit password_hash() sicher gehasht.
 */
include_once 'header.php';

require_login();

$currentUser = current_user();

$error = $success = $currentPassword = $newPassword = $newPasswordRepeat = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $currentPassword = trim($_POST['current_password'] ?? '');
  $newPassword = (string)($_POST['new_password'] ?? '');
  $newPasswordRepeat = (string)($_POST['new_password_repeat'] ?? '');

  // Validierung
  if($currentPassword === '' || $newPassword === '' || $newPasswordRepeat === '') {
    $error = 'Bitte alle Felder ausfüllen!';
  } elseif(mb_strlen($newPassword) < 8) {
    $error = 'Das neue Passwort muss mindestens 8 Zeichen lang sein!';
  } elseif($newPassword !== $newPasswordRepeat) {
    $error = 'Die neuen Passwörter stimmen nicht überein!';
  } else {
    // Aktuelles Passwort prüfen
    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE username = ?');
    $stmt->execute([$currentUser]);
    $user = $stmt->fetch();

    if(!$user) {
      $error = 'Benutzer nicht gefunden (bitte neu einloggen!)';
    } elseif(!password_verify($currentPassword, $user->password_hash)) {
      $error = 'Das aktuelle Passwort ist falsch!';
    } else {
      // neues Passwort setzen
      $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
      $update = $pdo->prepare('UPDATE users SET password_hash = ? WHERE username = ?');
      $update->execute([$newHash, $currentUser]);
      
      $success = 'Das Passwort wurde erfolgreich geändert!';
      $currentPassword = $newPassword = $newPasswordRepeat = '';
    }
  }
}
?>
<main class="container">
  <h2>Passwort ändern</h2>

  <?php if($error): ?>
    <p class="alert"><?= safe($error) ?></p>
  <?php endif; ?>

  <?php if($success): ?>
    <p class="alert alert-success"><?= safe($success) ?></p>
  <?php endif; ?>

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
    <label>Aktuelles Passwort:
      <input type="password" name="current_password" required>
    </label>
    <label>Neues Passwort (mind. 8 Zeichen):
      <input type="password" name="new_password" required>
    </label>
    <label>Neues Passwort wiederholen:
      <input type="password" name="new_password_repeat" required>
    </label>
    <button type="submit">Passwort ändern</button>
    <a href="index.php" class="button">Zurück auf Los!</a>
  </form>

</main>