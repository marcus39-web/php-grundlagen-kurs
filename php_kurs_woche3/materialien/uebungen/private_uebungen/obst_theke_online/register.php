<?php
require_once __DIR__ . '/db.inc.php';
session_start();
require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
$error = '';
$forename = '';
$lastname = '';
$email = '';
$password = '';
$passwordRepeat = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $forename = trim($_POST['forename'] ?? '');
  $lastname = trim($_POST['lastname'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = (string)($_POST['password'] ?? '');
  $passwordRepeat = (string)($_POST['password_repeat'] ?? '');
  if($forename === '' || $lastname === '' || $email === '' || $password === '' || $passwordRepeat === '') {
    $error = 'Bitte alle Felder ausfüllen!';
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Bitte eine gültige E-Mail-Adresse eingeben!';
  } elseif(mb_strlen($password) < 8) {
    $error = 'Das Passwort muss mindestens 8 Zeichen lang sein!';
  } elseif($password !== $passwordRepeat) {
    $error = 'Die beiden Passwörter stimmen nicht überein!';
  } else {
    $stmt = $pdo->prepare('SELECT users_id FROM tbl_users WHERE users_email = ?');
    $stmt->execute([$email]);
    $existing = $stmt->fetch();
    if($existing) {
      $error = 'Diese E-Mail ist bereits registriert!';
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare('INSERT INTO tbl_users (users_forename, users_lastname, users_email, users_password) VALUES (?, ?, ?, ?)');
      $stmt->execute([$forename, $lastname, $email, $hash]);
      $_SESSION['user'] = [
        'forename' => $forename,
        'lastname' => $lastname,
        'email' => $email
      ];
      header('Location: index.php');
      exit;
    }
  }
}
?>
<main class="container">
  <section class="card" style="max-width:480px; margin:48px auto;">
    <h2 style="text-align:center; margin-bottom:24px;">Benutzer-Registrierung</h2>
    <?php if($error): ?>
      <p class="alert text-danger" style="text-align:center; margin-bottom:16px;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
      <div style="margin-bottom:16px;">
        <label for="forename" style="font-weight:600; margin-bottom:6px; display:block;">Vorname:</label>
        <input type="text" name="forename" id="forename" required value="<?= htmlspecialchars($forename) ?>">
      </div>
      <div style="margin-bottom:16px;">
        <label for="lastname" style="font-weight:600; margin-bottom:6px; display:block;">Nachname:</label>
        <input type="text" name="lastname" id="lastname" required value="<?= htmlspecialchars($lastname) ?>">
      </div>
      <div style="margin-bottom:16px;">
        <label for="email" style="font-weight:600; margin-bottom:6px; display:block;">E-Mail:</label>
        <input type="email" name="email" id="email" required value="<?= htmlspecialchars($email) ?>">
      </div>
      <div style="margin-bottom:16px;">
        <label for="password" style="font-weight:600; margin-bottom:6px; display:block;">Passwort:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div style="margin-bottom:16px;">
        <label for="password_repeat" style="font-weight:600; margin-bottom:6px; display:block;">Passwort wiederholen:</label>
        <input type="password" name="password_repeat" id="password_repeat" required>
      </div>
      <div style="text-align:center; margin-top:16px;">
        <button type="submit" class="button">Registrieren</button>
      </div>
    </form>
  </section>
</main>
<?php require_once __DIR__ . '/inc/footer.inc.php'; ?>