
<?php
/**
 * nav.php – Navigationsmenü
 *
 * Zeigt die Hauptnavigation mit dynamischen Menüpunkten:
 * - Notizen, Kategorien (für alle)
 * - Benutzerverwaltung (nur für Admin)
 * - Passwort ändern (für eingeloggte User)
 * - Registrieren (für Gast-Besucher)
 * - Login/Logout Status
 */
// Notiz: Datei-Header und Kurzbeschreibung
?>
<nav>
  <div class="container">
    <ul>
      <li><a href="<?= $path ?>index.php">Notizen</a></li>
      <!-- Notiz: Link zur Notizen-Übersicht -->
      <li><a href="<?= $path ?>categ-manager.php">Kategorien</a></li>
      <!-- Notiz: Link zur Kategorienverwaltung -->
      <?php if(is_logged_in()): ?>
        <?php if(strtolower($_SESSION['user']) === 'admin'): ?>
          <li><a href="<?= $path ?>admin_users.php">Benutzerverwaltung</a></li>
          <!-- Notiz: Link zur Benutzerverwaltung für Admin -->
        <?php endif; ?>
        <li><a href="<?= $path ?>password_change.php">Passwort ändern</a></li>
        <!-- Notiz: Link zum Passwort ändern für eingeloggte User -->
      <?php else: ?>
        <li><a href="<?= $path ?>register.php">Registrieren</a></li>
        <!-- Notiz: Link zur Registrierung für Gäste -->
      <?php endif; ?>
    </ul>
    <div class="text-muted">
      <?php if(!empty($_SESSION['user'])): ?>
        Eingeloggt als <strong><?= safe($_SESSION['user']) ?></strong> - <a href="<?= $path ?>logout.php">Logout</a>
        <!-- Notiz: Anzeige des eingeloggten Benutzers und Logout-Link -->
      <?php else: ?>
        <a href="<?= $path ?>login.php">Login</a>
        <!-- Notiz: Link zum Login für Gäste -->
      <?php endif; ?>
    </div>
  </div>
</nav>
<!-- Notiz: Ende der Navigation -->