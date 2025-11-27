<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
?>
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

    // Dateityp überprüfen
    if(isset($allowed_files[$type])):
      // Dateigröße prüfen
      if(filesize($_FILES['datei']['tmp_name']) <= 2000000):
        
        $upload_dir = __DIR__ . '/images/';
        do{
          $new_filename = md5(uniqid($_FILES['datei']['tmp_name'], true)) . '.' . $allowed_files[$type];

          echo '<pre>', print_r( $upload_dir . $new_filename, true ), '</pre>';
          // wenn der Dateiname bereits existiert (sehr unwahrscheinlich, aber nicht ausgeschlossen), neuer Schleifendurchlauf => neuer Dateiname
        } while(file_exists($new_filename));

        // move_uploaded_file() verschiebt die hochgeladene Datei aus dem temporären Verzeichnis mit dem neu generierten Dateinamen in das angegebene Verzeichnis

      /** 
       * ! Bei Linux Rechte setzen!
       * sudo chown $USER /pfad/zum/verzeichnis
       * sudo chmod 777 /pfad/zum/verzeichnis
       * 
       * z.B.
       * sudo chown $USER ~/projects/php-grundlagen-kurs/php_kurs_woche3/datei-uplod/images
       * sudo chmod 777 ~/projects/php-grundlagen-kurs/php_kurs_woche3/datei-uplod/images
       * */
        move_uploaded_file($_FILES['datei']['tmp_name'], $upload_dir . $new_filename);

        ?>
        <img src="images/<?= $new_filename ?>" alt="Test">
      <?php else: ?>
        <p class="bad">Datei zu groß.</p>
      <?php endif; 
    else: ?>
      <p class="bad">falscher Dateityp.</p>
    <?php endif;
  } ?>

  </main>
</body>
</html>