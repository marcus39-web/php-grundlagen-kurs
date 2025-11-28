<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . '/db.inc.php';
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($email && $password) {
        $stmt = $pdo->prepare('SELECT * FROM tbl_users WHERE users_email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['users_password'])) {
            // Login erfolgreich, User-Daten in Session speichern
            $_SESSION['user'] = [
                'id' => $user['users_id'],
                'forename' => $user['users_forename'],
                'lastname' => $user['users_lastname'],
                'email' => $user['users_email']
            ];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Login fehlgeschlagen: E-Mail oder Passwort falsch.';
        }
    } else {
        $error = 'Bitte E-Mail und Passwort eingeben.';
    }
}
require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
?>
<main class="container">
    <section class="card" style="max-width:400px; margin:40px auto;">
        <h2 style="text-align:center; margin-bottom:24px;">Login</h2>
        <?php if ($error): ?>
            <p class="alert text-danger" style="text-align:center; margin-bottom:16px; font-weight:bold;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <div style="margin-bottom:16px;">
                <label for="email" style="font-weight:600; margin-bottom:6px; display:block;">E-Mail:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div style="margin-bottom:16px;">
                <label for="password" style="font-weight:600; margin-bottom:6px; display:block;">Passwort:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div style="text-align:center; margin-top:16px;">
                <button type="submit" class="button">Login</button>
            </div>
        </form>
    </section>
</main>
<?php require_once __DIR__ . '/inc/footer.inc.php'; ?>