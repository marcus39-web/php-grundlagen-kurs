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
</head>
<body>
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
                echo "<p class='good'>Dateitype und -größe sind ok, die Datei kann an ihr endgültiges Ziel Verschoben werden.</p>";
            } else {
                echo "<p class='bad'>Die Datei ist zu groß. Maximal 2 MB sind erlaubt.</p>";
            }
        } else {
            echo "<p class='bad'>falscher Dateityp.</p>";
        }
    }
  ?>