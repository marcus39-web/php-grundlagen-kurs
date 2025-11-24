<?php 
/**
 * admin_users.php – Admin-Benutzerverwaltung
 *
 * Übersicht und Verwaltung aller registrierten Benutzer (außer admin).
 * Nur für Admin zugänglich. Zeigt Online-Status, Registrierungsdatum, letzte Aktivität und ermöglicht das Abmelden von Benutzern.
 *
 * Funktionen:
 * - Zugriffsschutz: Nur Admin kann diese Seite sehen
 * - Tabellarische Übersicht aller User (außer admin)
 * - Online-Status (grün = online, rot = offline, Definition: Aktivität < 5 Min.)
 * - Abmelden-Button: Setzt last_activity auf NULL
 * - Anzeige von Registrierungsdatum und letzter Aktivität
 */
// Notiz: Datei-Header und Funktionsbeschreibung

include_once 'header.php';
// Notiz: Bindet das Header-Template ein

// Zugriffsschutz: Nur Admin darf diese Seite sehen
if (empty($_SESSION['user']) || strtolower($_SESSION['user']) !== 'admin') {
  header('Location: index.php');
  exit;
  // Notiz: Weiterleitung, falls kein Admin eingeloggt ist
}

// Benutzer abmelden (setzt last_activity auf NULL)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout_user'])) {
  $username = $_POST['username'] ?? '';
  // Notiz: Holt den Benutzernamen aus dem Formular

  if ($username && $username !== 'admin') {
    $stmt = $pdo->prepare('UPDATE users SET last_activity = NULL WHERE username = ?');
    $stmt->execute([$username]);
    $success = "Benutzer '$username' wurde abgemeldet.";

    // Notiz: Setzt last_activity auf NULL und zeigt Erfolgsmeldung
  }
}

// Alle Benutzer abrufen (außer admin)

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

// Notiz: Holt alle User aus der Datenbank, sortiert nach Online-Status und Name
?>


<main class="container">
  <section class="card">
    <h2>👥 Benutzerverwaltung (Admin)</h2>
    <!-- Notiz: Überschrift für die Admin-Benutzerverwaltung -->
    <?php if (isset($success)): ?>
      <p style="padding: 1rem; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
        <?= safe($success) ?>
        <!-- Notiz: Erfolgsmeldung nach Abmelden eines Users -->

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

              <!-- Notiz: Grüner Punkt = online, roter Punkt = offline -->
            </td>
            <td><?= safe($user->username) ?></td>
            <!-- Notiz: Zeigt den Benutzernamen -->
            <td><?= safe($user->created_at) ?></td>
            <!-- Notiz: Zeigt das Registrierungsdatum -->

            <td>
              <?php 
              if ($user->last_activity) {
                echo safe($user->last_activity);

                // Notiz: Zeigt die letzte Aktivität
              } else {
                echo '<em>Offline</em>';
                // Notiz: Zeigt "Offline" an, wenn keine Aktivität vorhanden

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

                  <!-- Notiz: Button zum Abmelden des Users -->
                </form>
              <?php else: ?>
                <span style="color: #999;">Bereits offline</span>
                <!-- Notiz: Hinweis, dass der User bereits offline ist -->

              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p style="margin-top: 1rem; font-size: 0.9em; color: #666;">
      <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #22c55e; margin-right: 5px;"></span> Online &nbsp;&nbsp;
      <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #ef4444; margin-right: 5px;"></span> Offline
      <!-- Notiz: Legende für die Statuspunkte -->

    </p>
  </section>
</main>

<?php include_once 'footer.php'; ?>

