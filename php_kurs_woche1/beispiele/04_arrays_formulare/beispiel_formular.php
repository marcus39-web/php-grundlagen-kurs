<?php
declare(strict_types=1);
$name = $_POST["name"] ?? "";
$msg  = $_POST["msg"] ?? "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (trim($name) === "" || trim($msg) === "") {
    $error = "Bitte alle Felder ausfüllen.";
  }
}
?><!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Formular Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Formular & Validierung</h1></header>
  <main class="container">
    <?php if ($error): ?><p class="alert"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post" class="card">
      <label> Name
        <input name="name" value="<?= htmlspecialchars($name) ?>">
      </label>
      <label> Nachricht
        <textarea name="msg" rows="4"><?= htmlspecialchars($msg) ?></textarea>
      </label>
      <button>Senden</button>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !$error): ?>
      <hr>
      <h2>Ausgabe</h2>
      <p><strong><?= htmlspecialchars($name) ?>:</strong> <?= nl2br(htmlspecialchars($msg)) ?></p>
    <?php endif; ?>
  </main>
</body>
</html>
