<nav>
  <div class="container">
    <ul>
      <li><a href="<?= $path ?>index.php">Notizen</a></li>
      <li><a href="<?= $path ?>categ-manager.php">Kategorien</a></li>
      <?php if(is_logged_in()): ?>
        <li><a href="<?= $path ?>password_change.php">Passwort ändern</a></li>
      <?php else: ?>
        <li><a href="<?= $path ?>register.php">Registrieren</a></li>
      <?php endif; ?>
    </ul>
    <div class="text-muted">
      <?php if(!empty($_SESSION['user'])): ?>
        Eingeloggt als <strong><?= safe($_SESSION['user']) ?></strong> - <a href="<?= $path ?>logout.php">Logout</a>
      <?php else: ?>
        <a href="<?= $path ?>login.php">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>