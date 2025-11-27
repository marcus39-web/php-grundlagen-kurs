<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <ul>
        <li><a href="index.php">Startseite</a></li>
        <?php if (empty($_SESSION['user'])): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Registrieren</a></li>
        <?php else: ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>
