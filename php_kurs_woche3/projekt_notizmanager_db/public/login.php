
<?php
/**
 * login.php – Benutzer-Login
 *
 * Zeigt das Login-Formular an und verarbeitet die Anmeldung.
 * Bei erfolgreicher Authentifizierung wird der User in der Session gespeichert
 * und zur index.php weitergeleitet.
 */
// Notiz: Datei-Header und Kurzbeschreibung

include_once 'header.php';
// Notiz: Bindet das Header-Template ein

$error = '';
// Notiz: Variable für Fehlermeldungen

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = trim($_POST['username'] ?? '');
  // Notiz: Holt und bereinigt den Benutzernamen
  $p = (string)($_POST['password'] ?? '');
  // Notiz: Holt das Passwort

  if($u !== '' && $p !== '') {
    if( authenticate($pdo, $u, $p) ) {
      $_SESSION['user'] = $u;
      // Notiz: Speichert den User in der Session
      header('Location: ' . $path . 'index.php');
      exit;
      // Notiz: Weiterleitung nach erfolgreichem Login
    } else {
      $error = 'Login fehlgeschlagen';
      // Notiz: Fehlermeldung bei falschen Daten
    }
  } else {
    $error = 'Bitte alle Felder ausfüllen!';
    // Notiz: Fehlermeldung bei leeren Feldern
  }
}
?>
<main class="container">
  <h2>Anmelden</h2>
  <!-- Notiz: Überschrift für das Login -->

  <?php if($error): ?>
    <p class="alert"><?= safe($error) ?></p>
    <!-- Notiz: Anzeige der Fehlermeldung -->
  <?php endif; ?>

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
    <label>Benutzername:
      <input type="text" name="username" required>
      <!-- Notiz: Eingabefeld für Benutzernamen -->
    </label>
    <label>Passwort:
      <input type="password" name="password" required>
      <!-- Notiz: Eingabefeld für Passwort -->
    </label>
    <button type="submit">Login</button>
    <!-- Notiz: Button zum Login -->
    <a href="index.php">Zurück auf Los!</a>
    <!-- Notiz: Link zur Startseite -->
  </form>
</main>