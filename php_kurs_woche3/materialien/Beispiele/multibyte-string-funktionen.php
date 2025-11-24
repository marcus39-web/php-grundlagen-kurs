<!DOCTYPE html>
<html lang='de'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Multibyte String-Funktionen</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <h1>Multibyte Zeichenketten-Funktionen</h1>
  <!-- Erklärung, warum Multibyte-Funktionen nötig sind -->
  <h2>Warum Multibyte-Funktionen?</h2>
  <p>Die klassischen Zeichenketten-Funktionen stammen aus Zeiten, in denen Zeichensätze wie "Latin-1" verwendet wurden. Dort hatte jedes Zeichen genau 1 Byte. In UTF-8 kann ein Zeichen mehrere Bytes haben. Daher sind die klassischen Funktionen für moderne Zeichensätze ungeeignet. Siehe <a href="https://www.gerd-riesselmann.net/softwareentwicklung/php-und-utf-8-eine-anleitung-teil-3-php-string-funktionen/">Blog von Gerd Riesselmann</a> und <a href="https://www.php.net/manual/en/ref.mbstring.php">PHP-Manual</a>.</p>

  <!-- Vergleich zwischen strlen und mb_strlen -->
  <h3>Beispiel:</h3>
  <?= 'strlen("Ä"): ' . strlen('Ä') . '<br>mb_strlen("Ä"): ' . mb_strlen('Ä') ?>

  <h2>Position</h2>
  <?php
  // Beispieltext mit Umlauten und Sonderzeichen
  $tx = '<p>Sage nicht alles was du weißt, aber wisse immer was du sagst!';
  echo "$tx</p>";

  // Verschiedene Positionen von Zeichen/Suchmustern im String
  echo '<p>Positionen:<br>';
  echo 'S ab Anfang: ' . mb_strpos($tx, 'S') . '<br>'; // Erstes S
  echo 'S oder s ab Anfang: ' . mb_stripos($tx, 'S') . '<br>'; // Erstes S/s (case-insensitive)
  echo 's ab Ende: ' . mb_strrpos($tx, 's') . '<br>'; // Letztes s
  echo 'S oder s ab Ende: ' . mb_strripos($tx, 's') . '<br>'; // Letztes S/s (case-insensitive)

  // Alle S oder s ab Anfang finden
  echo 'Alle S oder s ab Anfang: ';
  $pos = -1;
  while ($pos = mb_stripos($tx, 'S', $pos + 1))
    echo "$pos ";
  echo '</p>';

  // Teilzeichenketten mit mb_substr
  echo '<p>Teilzeichenketten:<br>';
  echo 'Ab 4 bis Ende: ' . mb_substr($tx, 4) . '<br>';
  echo 'Ab 4, 2 Zeichen: ' . mb_substr($tx, 4, 2) . '<br>';
  echo 'Ab -4 bis Ende: ' . mb_substr($tx, -4) . '<br>';
  echo 'Ab -4, 2 Zeichen: ' . mb_substr($tx, -4, 2) . '</p>';
  ?>

  <h2>Eigenschaften, Manipulation, Codes</h2>
  <?php
  echo '<p>';
  $tx = 'Wäre Jörg ein großer Sänger, würde er schöne Lieder singen';
  echo $tx . '</p>';

  // Anzahl der Zeichen (korrekt für Umlaute etc.)
  echo '<p>Anzahl Zeichen: ' . mb_strlen($tx) . '<br>';
  // Alles in Kleinbuchstaben
  echo mb_strtolower($tx) . '<br>';
  // Alles in Großbuchstaben
  echo mb_strtoupper($tx) . '</p>';

  // String in einzelne Zeichen zerlegen
  $ar = mb_str_split($tx);
  for ($i = 0; $i < count($ar); $i++)
    echo $ar[$i] . '|';
  echo '<br>';
  // Unicode-Code jedes Zeichens ausgeben
  for ($i = 0; $i < count($ar); $i++)
    echo mb_ord($ar[$i]) . ' ';
  echo '<br>';

  // Zeichen aus Unicode-Code erzeugen
  for ($i = 32; $i <= 64; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';
  for ($i = 65; $i <= 90; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';
  for ($i = 97; $i <= 122; $i++)
    echo mb_chr($i) . ' ';
  echo '<br>';
  for ($i = 224; $i <= 252; $i++)
    echo mb_chr($i) . ' ';
  echo '</p>';
  ?>

  <h2>Suchen und Ersetzen mit regulären Ausdrücken</h2>
  <?php
  echo '<p>';
  // Beispieltext mit Umlauten und Sonderzeichen
  $tx = 'Forscherdrang und gleichzeitig das Böse im Menschen erreichen den Climax, wenn sich die Mitte des gezerrten Bärchens von Millionen Mikrorissen weiß färbt und gleich darauf das zweigeteilte Stück auf die Finger zurückschnappt. Man hat ein Gefühl der Macht über das hilflose, nette Gummibärchen.';
  echo $tx . '</p><p>';

  // Suche nach 'das' im Text
  mb_ereg_search_init($tx, 'das');
  if (mb_ereg_search())  echo 'Gefunden: das<br>';

  // Alle Vorkommen von 'as' im Text
  $i = 1;
  mb_ereg_search_init($tx, 'as');
  while (mb_ereg_search())
    echo 'Fund ' . $i++ . ': as<br>';

  // Prüfen, ob der Text mit 'sich' beginnt
  mb_ereg_search_init($tx, '^sich');
  if (mb_ereg_search())  echo 'Beginnt mit: sich<br>';
  else                  echo 'Beginnt nicht mit: sich<br>';

  // Prüfen, ob der Text mit 'sich' endet
  mb_ereg_search_init($tx, 'sich$');
  if (mb_ereg_search())  echo 'Endet mit: sich<br>';
  else                  echo 'Endet nicht mit: sich<br>';

  // Prüfen, ob der Text mit 'Gummibärchen.' endet
  mb_ereg_search_init($tx, 'Gummibärchen.$');
  if (mb_ereg_search())  echo 'Endet mit: Gummibärchen.</p><p>';
  else                  echo 'Endet nicht mit: Gummibärchen.</p><p>';

  // Ersetzen von 'das' durch <mark>xyz</mark>
  echo mb_ereg_replace('das', '<mark>xyz</mark>', $tx) . '<br>';
  // Ersetzen von 'das' (case-insensitive) durch <mark>abc</mark>
  echo mb_eregi_replace('das', '<mark>abc</mark>', $tx) . '</p>';
  ?>

  <h2>Zeichenketten und Arrays</h2>
  <?php
  echo '<p>';
  // Beispiel für das Zerlegen eines Strings in ein Array
  $tx = 'Maier;Hans;6714;3500;1962-03-15';
  $feld = mb_split(';', $tx);
  for ($i = 0; $i < count($feld); $i++)
    echo $feld[$i] . '<br>';
  echo '</p><p>';

  // Zusammenfügen eines Arrays zu einem String
  echo implode(';', $feld), '</p>';
  ?>
</body>

</html>