<?php 
include_once 'header.php'; 

$error = '';
$username = '';
$password = '';
$passwordRepeat = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = (string)($_POST['password'] ?? '');
  $passwordRepeat = (string)($_POST['password_repeat'] ?? '');

  // Validierung
  if($username === '' || $password === '' || $passwordRepeat === '') {
    $error = 'Bitte alle Felder ausfüllen!';
  } elseif(mb_strlen($username) < 3) {
    $error = 'Der Benutzername muss mindestens 3 Zeichen lang sein!';
  } elseif(mb_strlen($password) < 8) {
    $error = 'Das Passwort muss mindestens 8 Zeichen lang sein!';
  } elseif($password !== $passwordRepeat) {
    $error = 'Die beiden Passwörter stimmen nicht überein!';
  } else {
    // Prüfen, ob der Benutzername bereits existiert
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $existing = $stmt->fetch();

    if($existing) {
      $error = 'Der Benutzername ist bereits vergeben!';
    } else {
      // Benutzer anlegen
      $hash = password_hash($password, PASSWORD_DEFAULT);

      $stmt = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
      $stmt->execute([$username, $hash]);
    }

    // direkt einloggen
    $_SESSION['user'] = $username;

    header('Location: ' . $path . 'index.php');
    exit;
  }
}
?>

<main class="container">
  <h2>Benutzer-Registrierung</h2>

  <?php if($error): ?>
    <p class="alert"><?= safe($error) ?></p>
  <?php endif; ?>

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
    <label>Benutzername:
      <input type="text" name="username" required value="<?= safe($username) ?>">
    </label>
    <label>Passwort:
      <input type="password" name="password" required>
    </label>
    <label>Passwort wiederholen:
      <input type="password" name="password_repeat" required>
    </label>
    <button type="submit">Registrieren</button>
  </form>

</main>