<?php
declare(strict_types=1);
session_start();
require __DIR__ . '/../inc/db.php';
require __DIR__ . '/../inc/functions.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = trim($_POST['username'] ?? '');
  $p = (string)($_POST['password'] ?? '');
  if ($u !== '' && $p !== '') {
    if (authenticate($pdo, $u, $p)) {
      $_SESSION['user'] = $u;
      header('Location: index.php'); exit;
    } else {
      $error = 'Login fehlgeschlagen';
    }
  } else {
    $error = 'Bitte alle Felder ausfüllen';
  }
}
?><!doctype html><html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="../style/style.css">
</head><body><main class="container">
  <h1>Login</h1>
  <?php if ($error): ?><p class="alert"><?= safe($error) ?></p><?php endif; ?>
  <form method="post">
    <label>Benutzername <input name="username" required></label>
    <label>Passwort <input type="password" name="password" required></label>
    <button>Anmelden</button>
    <a class="button" href="index.php">Zurück</a>
  </form>
  <p class="text-muted">Demo‑User: <code>admin</code> / <code>admin123</code> (nach Import aus SQL‑Dump)</p>
</main></body></html>
