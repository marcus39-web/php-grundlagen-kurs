<?php 
/**
 * Admin-Benutzerverwaltung
 * 
 * Funktionen:
 * - Nur für Admin zugänglich (Zugriffsschutz via Session-Check)
 * - Tabellarische Übersicht aller registrierten Benutzer (außer admin)
 * - Online-Status mit farbigen Indikatoren (grün = online, rot = offline)
 * - Online-Definition: Letzte Aktivität innerhalb der letzten 5 Minuten
 * - "Abmelden"-Button zum erzwungenen Logout von Benutzern
 * - Setzt last_activity auf NULL beim Abmelden
 * - Anzeige von Registrierungsdatum und letzter Aktivität
 */
include_once 'header.php';

// Nur Admin hat Zugriff
if (empty($_SESSION['user']) || strtolower($_SESSION['user']) !== 'admin') {
  header('Location: index.php');
  exit;
}

// Benutzer abmelden (last_activity auf NULL setzen)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout_user'])) {
  $username = $_POST['username'] ?? '';
  if ($username && $username !== 'admin') {
    $stmt = $pdo->prepare('UPDATE users SET last_activity = NULL WHERE username = ?');
    $stmt->execute([$username]);
    $success = "Benutzer '$username' wurde abgemeldet.";
  }
}

// Alle Benutzer abrufen
$stmt = $pdo->query("
  SELECT 
    id,
    username, 
    created_at,
    last_activity,
    CASE 
      WHEN last_activity IS NOT NULL AND last_activity > DATE_SUB(NOW(), INTERVAL 5 MINUTE) 
      THEN 1 
      ELSE 0 
    END as is_online
  FROM users 
  WHERE LOWER(username) != 'admin' 
  ORDER BY is_online DESC, username ASC
");
$users = $stmt->fetchAll();
?>

<main class="container">
  <section class="card">
    <h2>👥 Benutzerverwaltung (Admin)</h2>
    
    <?php if (isset($success)): ?>
      <p style="padding: 1rem; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
        <?= safe($success) ?>
      </p>
    <?php endif; ?>

    <table>
      <thead>
        <tr>
          <th>Status</th>
          <th>Benutzername</th>
          <th>Registriert seit</th>
          <th>Letzte Aktivität</th>
          <th>Aktionen</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td style="text-align: center;">
              <span style="display: inline-block; width: 12px; height: 12px; border-radius: 50%; background-color: <?= $user->is_online ? '#22c55e' : '#ef4444' ?>;"></span>
            </td>
            <td><?= safe($user->username) ?></td>
            <td><?= safe($user->created_at) ?></td>
            <td>
              <?php 
              if ($user->last_activity) {
                echo safe($user->last_activity);
              } else {
                echo '<em>Offline</em>';
              }
              ?>
            </td>
            <td>
              <?php if ($user->is_online): ?>
                <form method="post" style="display: inline;">
                  <input type="hidden" name="username" value="<?= safe($user->username) ?>">
                  <button type="submit" name="logout_user" class="button" style="background-color: #f59e0b;">
                    Abmelden
                  </button>
                </form>
              <?php else: ?>
                <span style="color: #999;">Bereits offline</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    <p style="margin-top: 1rem; font-size: 0.9em; color: #666;">
      <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #22c55e; margin-right: 5px;"></span> Online &nbsp;&nbsp;
      <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #ef4444; margin-right: 5px;"></span> Offline
    </p>
  </section>
</main>

<?php include_once 'footer.php'; ?>
