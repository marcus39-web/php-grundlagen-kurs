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
  <title>Fake-Gif</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <h1>Fake-Gif</h1>
  </header>
  <main class="container">
    <pre>
      <?php
        
        // Dateiname: fakegif.gif
        // Datei erstellen
        $filename = tempnam('.', 'fakeimage');

        // Datei mit "magischen" Bytes und der davor gesetzten Zeichenfolge "GIF89a" füllen
        file_put_contents($filename, 'GIF89a' . random_bytes(100));

        echo "\nMIME-Type: ", mime_content_type($filename), "\n\n";
        echo print_r( getimagesize($filename), true );
        echo "\n";

        // temporär erzeugte Datei löschen
        unlink($filename);

        /**
       * ! Obwohl die zufällig generierte Datei (höchstwahrscheinlich) keine valide GIF-Datei ist, erkennen sowohl getimagesize() als auch mime_content_type() sie als solche. Das zum Bestimmen der Abmessungen einer Bilddatei bestimmte getimagesize() bietet folglich kein Mehr an Sicherheit gegenüber mime_content_type(), im Gegenteil suggeriert es eher eine falsche Sicherheit.
       */
        
      ?>
    </pre>
  </main>
</body>
</html>