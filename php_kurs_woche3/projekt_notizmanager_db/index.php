<?php
/**
 * Startseite des Notiz-Manager Projekts (öffentlich zugänglich)
 * 
 * Funktionen:
 * - Willkommensseite mit Navigation zu den Hauptfunktionen
 * - Links zu Notizen, Kategorien, Login und Registrierung
 * - Anzeige der aktuell online Benutzer (grüner Punkt)
 * - Online-Status: Benutzer aktiv in den letzten 5 Minuten
 * - Admin wird nicht in der Online-Liste angezeigt
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notiz-Manager DB - Startseite</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Notiz-Manager DB</h1>
    </div>
  </header>
  
  <main class="container">
    <section class="card">
      <h2>Willkommen beim Notiz-Manager</h2>
      <p>Verwalten Sie Ihre Notizen und Kategorien effizient.</p>
      
      <nav style="margin-top: 2rem;">
        <ul style="list-style: none; padding: 0;">
          <li style="margin: 1rem 0;">
            <a href="public/index.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              📝 Notizen verwalten
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/categ-manager.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              📁 Kategorien verwalten
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/login.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              🔐 Login
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/register.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              ✍️ Registrieren
            </a>
          </li>
        </ul>
      </nav>
    </section>

    <?php
    // Datenbankverbindung für Benutzeranzeige
    require_once __DIR__ . '/inc/db-connect.php';
    
    // Nur online Benutzer abrufen (aktiv in den letzten 5 Minuten, außer admin)
    $stmt = $pdo->query("
      SELECT 
        username, 
        last_activity
      FROM users 
      WHERE LOWER(username) != 'admin' 
        AND last_activity IS NOT NULL 
        AND last_activity > DATE_SUB(NOW(), INTERVAL 5 MINUTE)
      ORDER BY username ASC
    ");
    $onlineUsers = $stmt->fetchAll();
    
    if (count($onlineUsers) > 0):
    ?>
    <section class="card" style="margin-top: 2rem;">
      <h2>🟢 Online Benutzer</h2>
      <table>
        <thead>
          <tr>
            <th>Benutzername</th>
            <th>Letzte Aktivität</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($onlineUsers as $user): ?>
            <tr>
              <td>
                <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #22c55e; margin-right: 8px;"></span>
                <?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?>
              </td>
              <td><?= htmlspecialchars($user->last_activity, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
    <?php else: ?>
    <section class="card" style="margin-top: 2rem;">
      <h2>🟢 Online Benutzer</h2>
      <p style="color: #666;"><em>Aktuell sind keine Benutzer online.</em></p>
    </section>
    <?php endif; ?>
  </main>

  <footer style="text-align: center; padding: 2rem; margin-top: 2rem; color: #666;">
    <p>&copy; 2025 Notiz-Manager DB</p>
  </footer>
</body>
</html>
