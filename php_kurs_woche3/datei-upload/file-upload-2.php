<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datei-Upload: File-Upload</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <h1>Datei-Upload: File-Upload 2</h1>
  </header>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="datei" required>
        <button type="submit">Datei hochladen</button>
    </form>
</body>
</html>

<?php

  if (!empty($_FILES)) {
    echo '<pre>', htmlspecialchars(print_r($_FILES, true)), '</pre>';
    echo '<pre>UPLOAD_ERR_OK ', print_r(UPLOAD_ERR_OK, true), '</pre>';
  }

  $allowed_files = [
    'image/jpeg' => 'jpg',
    'image/gif' => 'gif',
    'image/png' => 'png',
    'image/webp' => 'webp',
  ];


// Prüfe ob das Formular gesendet wurde und das $_FILES-Array bestückt wurde und dass keine Fehler aufgetreten sind
if(!empty($_FILES) && $_FILES['datei']['error'] === UPLOAD_ERR_OK) {
    $type = mime_content_type($_FILES['datei']['tmp_name']);
    $new_filename = '';

echo '<pre>', print_r($type, true), '</pre>';

        if (isset($allowed_files[$type])) {
            if(filesize($_FILES['datei']['tmp_name']) <= 2000000) {
                
                $upload_dir = '/home/rio/projects/php-grundlagen-kurs/php_kurs_woche3/datei-upload/images/';
                do{
                    $new_filename = md5(uniqid($_FILES['datei']['tmp_name'], true)) . '.' . $allowed_files[$type];

                    echo '<pre>', print_r($new_filename, true), '</pre>';
                    // wenn der Dateiname bereits exestiert (sehr unwahrscheinlich, aber nicht ausgeschlossen), neuer Schleifendurchlauf => neuer Dateiname
                } while(file_exists($upload_dir . $new_filename));

                ?>
                <img src="images/<?= $new_filename ?>" alt="Test">
                <?php
                // move_uploaded_file() verschiebt die hochgeladene Datei aus dem temporären Verzeichnis mit dem neu generierten Dateinamen in das angegebene Verzeichnis
                move_uploaded_file($_FILES['datei']['tmp_name'], $upload_dir . $new_filename);
                // Hier kannst du den Upload durchführen, z.B. move_uploaded_file()
            } else {
                echo '<p class="bad">Die Datei ist zu groß</p>';
            }
        } else {
            echo '<p class="bad">Falscher Dateityp</p>';
        }
    }
?>