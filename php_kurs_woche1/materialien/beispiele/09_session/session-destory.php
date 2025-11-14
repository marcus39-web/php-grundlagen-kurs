<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session zerstören</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header>
    <h1>Session-Daten und das Session-Cookie löschen</h1>
  </header>
  <main class="container">
    <?php 
    echo '<pre>', print_r( $_SESSION, true ), '</pre>';
    
    /* Einzelne Werte aus dem Session-Array löschen */
    unset( $_SESSION['vorname'] );

    echo '<pre>', print_r( $_SESSION, true ), '</pre>';
    
    /* Um die Session zu löschen, wird sicherheitshalber zunächst das Array geleert */
    $_SESSION = array();

    echo '<pre>', print_r( $_SESSION, true ), '</pre>';

    echo '<p>Die Session mit der ID ' . session_id() . ' wurde ';

    if( session_destroy() ) {
      echo 'erfolgreich gelöscht.';
    } else {
      echo 'nicht gelöscht';
    }

    echo '.</p>';
    ?>
  </main>
</body>
</html>