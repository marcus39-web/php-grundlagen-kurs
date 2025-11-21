<?php
/**
 * nav.php - Navigationsmen\u00fc
 * 
 * Zeigt die Hauptnavigation mit dynamischen Men\u00fcpunkten:
 * - Notizen, Kategorien (f\u00fcr alle)
 * - Benutzerverwaltung (nur f\u00fcr Admin)
 * - Passwort \u00e4ndern (f\u00fcr eingeloggte User)
 * - Registrieren (f\u00fcr Gast-Besucher)
 * - Login/Logout Status
 */
?>
<nav>
  <div class="container">
    <ul>
      <li><a href="<?= $path ?>index.php">Notizen</a></li>
      <li><a href="<?= $path ?>categ-manager.php">Kategorien</a></li>
      <?php if(is_logged_in()): ?>
        <?php if(strtolower($_SESSION['user']) === 'admin'): ?>
          <li><a href="<?= $path ?>admin_users.php">Benutzerverwaltung</a></li>
        <?php endif; ?>
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