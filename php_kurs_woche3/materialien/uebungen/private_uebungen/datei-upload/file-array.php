<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datei-Upload</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <h1>Datei-Upload: File-Array</h1>
  </header>
  <main class="container">
  <?php

  if (!empty($_FILES)) {
    echo '<pre>', htmlspecialchars(print_r($_FILES, true)), '</pre>';
  }

  ?>
  </main>
</body>
</html>