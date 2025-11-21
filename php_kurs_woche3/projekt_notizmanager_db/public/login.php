<?php
/**
 * login.php - Benutzer-Login
 * 
 * Zeigt das Login-Formular an und verarbeitet die Anmeldung.
 * Bei erfolgreicher Authentifizierung wird der User in der Session gespeichert
 * und zur index.php weitergeleitet.
 */
include_once 'header.php'; 

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = trim($_POST['username'] ?? '');
  $p = (string)($_POST['password'] ?? '');

  if($u !== '' && $p !== '') {
    if( authenticate($pdo, $u, $p) ) {
      $_SESSION['user'] = $u;
      header('Location: ' . $path . 'index.php');
      exit;
    } else {
      $error = 'Login fehlgeschlagen';
    }
  } else {
    $error = 'Bitte alle Felder ausfüllen!';
  }
}
?>
<main class="container">
  <h2>Anmelden</h2>

  <?php if($error): ?>
    <p class="alert"><?= safe($error) ?></p>
  <?php endif; ?>

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
    <label>Benutzername:
      <input type="text" name="username" required>
    </label>
    <label>Passwort:
      <input type="password" name="password" required>
    </label>
    <button type="submit">Login</button>
    <a href="index.php">Zurück auf Los!</a>
  </form>
</main>