<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="container" style="margin-bottom:24px;">
    <ul style="display:flex; justify-content:center; gap:1.5rem; list-style:none; margin:0; padding:1rem;">
        <?php if (empty($_SESSION['user'])): ?>
            <li><a href="login.php" class="button">Login</a></li>
            <li><a href="register.php" class="button">Registrieren</a></li>
        <?php else: ?>
            <li><a href="logout.php" class="button">Logout</a></li>
            <li><a href="kategorie_manage.php" class="button" style="background:var(--primary); color:#fff; padding:8px 18px; border-radius:6px; font-weight:500; text-decoration:none;">Kategorien verwalten</a></li>
            <li><a href="produkt_hinzufuegen.php" class="button" style="background:var(--primary); color:#fff; padding:8px 18px; border-radius:6px; font-weight:500; text-decoration:none;">Produkt hinzufügen</a></li>
        <?php endif; ?>
    </ul>
</nav>
