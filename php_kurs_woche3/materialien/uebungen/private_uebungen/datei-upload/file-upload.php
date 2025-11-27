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
    <h1>Datei-Upload: File-Upload</h1>
  </header>
  <main class="container">
  <?php

  if (!empty($_FILES)) {
    echo '<pre>', htmlspecialchars(print_r($_FILES, true)), '</pre>';
    echo '<pre>UPLOAD_ERR_OK: ', print_r( UPLOAD_ERR_OK ), '</pre>';
  }

  $allowed_files = [
    'image/jpeg' => 'jpg',
    'image/gif'  => 'gif',
    'image/png'  => 'png',
    'image/webp'  => 'webp'
  ];

  // Prüfe, ob das Formular gesendet wurde und das $_FILES-Array bestückt wurde und dass keine Fehler aufgetreten sind
  if(!empty($_FILES) && $_FILES['datei']['error'] === UPLOAD_ERR_OK) {
    $type = mime_content_type($_FILES['datei']['tmp_name']);
    $new_filename = '';

    echo '<pre>Dateityp: ', print_r( $type, 1 ), '</pre>';

    // Dateityp überprüfen
    if(isset($allowed_files[$type])):
      // Dateigröße prüfen
      if(filesize($_FILES['datei']['tmp_name']) <= 2000000): ?>
        <p class="good">Dateityp und -größe sind ok, die Datei kann an ihr endgültiges Ziel Verschoben werden.</p>
      <?php else: ?>
        <p class="bad">Datei zu groß.</p>
      <?php endif; 
    else: ?>
      <p class="bad">falscher Dateityp.</p>
    <?php endif;
  } ?>

  ?>

  </main>
</body>
</html>