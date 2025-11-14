<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benutzer anlegen</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Benutzer Registrierung</h1>
  </header>
  <main class="container">
    <?php
      
    // Datencheck
    echo '<pre>', print_r( $_POST, true ), '</pre>';

    // Inhalt des Superglobalen Arrays in einzelne Variablen speichern
    $vorname = $_POST['fname'];
    $nachname = $_POST['lname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    echo nl2br("<p>Folgende Daten wurden gespeichert:<br>$vorname $nachname<br>$email<br>$msg.</p>");

    // Formulardaten in ein indiziertes Array übernehmen
    $fields = array( $vorname, $nachname, $email, $msg );

    // Öffnen der CSV-Datei zum Schreiben (Anhängen)
    $fh = fopen('benutzer.csv', 'a');

    // eine Zeile in die CSV-Datei schreiben
    fputcsv( $fh, $fields, ';');

    // Datei schließen
    fclose($fh);
      
    ?>
  </main>
</body>
</html>