<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . '/db.inc.php';
session_start();

$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $forename = trim($_POST['forename'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($forename && $lastname && $email && $password) {
        // Prüfen, ob E-Mail schon existiert
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM tbl_users WHERE users_email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $error = 'Diese E-Mail ist bereits registriert.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO tbl_users (users_forename, users_lastname, users_email, users_password) VALUES (?, ?, ?, ?)');
            $stmt->execute([$forename, $lastname, $email, $hash]);
            $success = 'Registrierung erfolgreich! Du kannst dich jetzt einloggen.';
        }
    } else {
        $error = 'Bitte alle Felder ausfüllen.';
    }
}
?>

<body>
    <h2>Registrierung</h2>
    <?php if ($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Vorname:<br>
            <input type="text" name="forename" required>
        </label><br>
        <label>Nachname:<br>
            <input type="text" name="lastname" required>
        </label><br>
        <label>E-Mail:<br>
            <input type="email" name="email" required>
        </label><br>
        <label>Passwort:<br>
            <input type="password" name="password" required>
        </label><br><br>
        <button type="submit">Registrieren</button>
    </form>
</body>
</html>