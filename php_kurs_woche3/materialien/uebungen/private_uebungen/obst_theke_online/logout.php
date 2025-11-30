<?php
session_start();
session_destroy();
require_once __DIR__ . '/inc/header.inc.php';
require_once __DIR__ . '/inc/nav.inc.php';
?>
<main class="container">
  <section class="card" style="max-width:400px; margin:48px auto;">
    <h2 style="text-align:center; margin-bottom:24px;">Logout</h2>
    <p class="alert" style="text-align:center; color:green; font-weight:bold;">Sie wurden erfolgreich ausgeloggt.</p>
    <p style="text-align:center; margin-top:24px;"><a href="index.php" class="button">Zurück zur Startseite</a></p>
  </section>
</main>
<?php require_once __DIR__ . '/inc/footer.inc.php'; ?>
