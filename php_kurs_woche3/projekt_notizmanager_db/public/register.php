<?php
/**
 * register.php – Registrierungsseite für neue Benutzer
 *
 * Diese Datei ermöglicht die Registrierung neuer Benutzer.
 * Validiert die Eingaben, prüft auf doppelte Benutzernamen,
 * speichert das Passwort sicher und loggt den Benutzer direkt ein.
 */
// Notiz: Datei-Header und Kurzbeschreibung

include_once 'header.php';
// Notiz: Bindet das Header-Template ein

$error = '';
$username = '';
$password = '';
$passwordRepeat = '';
// Notiz: Initialisiert Variablen für das Formular

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  // Notiz: Holt und bereinigt den Benutzernamen
  $password = (string)($_POST['password'] ?? '');
  // Notiz: Holt das Passwort
  $passwordRepeat = (string)($_POST['password_repeat'] ?? '');
  // Notiz: Holt das wiederholte Passwort

  // Validierung
  if($username === '' || $password === '' || $passwordRepeat === '') {
    $error = 'Bitte alle Felder ausfüllen!';
    // Notiz: Fehlermeldung bei leeren Feldern
  } elseif(mb_strlen($username) < 3) {
    $error = 'Der Benutzername muss mindestens 3 Zeichen lang sein!';
    // Notiz: Fehlermeldung bei zu kurzem Benutzernamen
  } elseif(mb_strlen($password) < 8) {
    $error = 'Das Passwort muss mindestens 8 Zeichen lang sein!';
    // Notiz: Fehlermeldung bei zu kurzem Passwort
  } elseif($password !== $passwordRepeat) {
    $error = 'Die beiden Passwörter stimmen nicht überein!';
    // Notiz: Fehlermeldung bei ungleichen Passwörtern
  } else {
    // Prüfen, ob der Benutzername bereits existiert
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $existing = $stmt->fetch();

    if($existing) {
      $error = 'Der Benutzername ist bereits vergeben!';
      // Notiz: Fehlermeldung bei vorhandenem Benutzernamen
    } else {
      // Benutzer anlegen
      $hash = password_hash($password, PASSWORD_DEFAULT);
      // Notiz: Passwort sicher hashen

      $stmt = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
      $stmt->execute([$username, $hash]);
      // Notiz: Benutzer in der Datenbank speichern
    }

    // direkt einloggen
    $_SESSION['user'] = $username;
    // Notiz: Benutzer direkt einloggen

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
<?php include_once 'footer.php'; ?>