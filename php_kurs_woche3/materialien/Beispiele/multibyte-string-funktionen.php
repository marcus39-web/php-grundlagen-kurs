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
  <h2>Warum Multibyte-Funktionen?</h2>
  <p>Die klassischen Zeichenketten-Funktionen stammen aus Zeiten, in welchem die Zeichensätze wie "Latin-1" etc. benutzt wurden. Hierbei bekam in diesen Zeichensätzen jedes Zeichen genau 1 Byte zugewiesen. In UTF-8-Zeichensätzen kann aber ein Zeichen beliebig viele Zeichen beinhalten. Eine gute Zusammenfassung dieser Probleme findet man im <a href="https://www.gerd-riesselmann.net/softwareentwicklung/php-und-utf-8-eine-anleitung-teil-3-php-string-funktionen/">Blog von Gerd Riesselmann</a>. Im PHP-Manual: <a href="https://www.php.net/manual/en/ref.mbstring.php">https://www.php.net/manual/en/ref.mbstring.php</a>.</p>

  <h3>Beispiel:</h3>
  <?= 'strlen("Ä"): ' . strlen('Ä') . '<br>mb_strlen("Ä"): ' . mb_strlen('Ä') ?>

  <h2>Position</h2>
  <?php
  $tx = '<p>Sage nicht alles was du weißt, aber wisse immer was du sagst!';
  echo "$tx</p>";

  echo '<p>Positionen:<br>';
  echo 'S ab Anfang: ' . mb_strpos($tx, 'S') . '<br>';
  echo 'S oder s ab Anfang: ' . mb_stripos($tx, 'S') . '<br>';
  echo 's ab Ende: ' . mb_strrpos($tx, 's') . '<br>';
  echo 'S oder s ab Ende: ' . mb_strripos($tx, 's') . '<br>';

  echo 'Alle S oder s ab Anfang: ';
  $pos = -1;
  while ($pos = mb_stripos($tx, 'S', $pos + 1))
    echo "$pos ";
  echo '</p>';

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

  echo '<p>Anzahl Zeichen: ' . mb_strlen($tx) . '<br>';
  echo mb_strtolower($tx) . '<br>';
  echo mb_strtoupper($tx) . '</p>';

  $ar = mb_str_split($tx);
  for ($i = 0; $i < count($ar); $i++)
    echo $ar[$i] . '|';
  echo '<br>';
  for ($i = 0; $i < count($ar); $i++)
    echo mb_ord($ar[$i]) . ' ';
  echo '<br>';

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
  $tx = 'Forscherdrang und gleichzeitig das Böse im Menschen erreichen den Climax, wenn sich die Mitte des gezerrten Bärchens von Millionen Mikrorissen weiß färbt und gleich darauf das zweigeteilte Stück auf die Finger zurückschnappt. Man hat ein Gefühl der Macht über das hilflose, nette Gummibärchen.';
  echo $tx . '</p><p>';

  mb_ereg_search_init($tx, 'das');
  if (mb_ereg_search())  echo 'Gefunden: das<br>';

  $i = 1;
  mb_ereg_search_init($tx, 'as');
  while (mb_ereg_search())
    echo 'Fund ' . $i++ . ': as<br>';

  mb_ereg_search_init($tx, '^sich');
  if (mb_ereg_search())  echo 'Beginnt mit: sich<br>';
  else                  echo 'Beginnt nicht mit: sich<br>';

  mb_ereg_search_init($tx, 'sich$');
  if (mb_ereg_search())  echo 'Endet mit: sich<br>';
  else                  echo 'Endet nicht mit: sich<br>';

  mb_ereg_search_init($tx, 'Gummibärchen.$');
  if (mb_ereg_search())  echo 'Endet mit: Gummibärchen.</p><p>';
  else                  echo 'Endet nicht mit: Gummibärchen.</p><p>';

  echo mb_ereg_replace('das', '<mark>xyz</mark>', $tx) . '<br>';
  echo mb_eregi_replace('das', '<mark>abc</mark>', $tx) . '</p>';
  ?>

  <h2>Zeichenketten und Arrays</h2>
  <?php
  echo '<p>';
  $tx = 'Maier;Hans;6714;3500;1962-03-15';
  $feld = mb_split(';', $tx);
  for ($i = 0; $i < count($feld); $i++)
    echo $feld[$i] . '<br>';
  echo '</p><p>';

  echo implode(';', $feld), '</p>';
  ?>
</body>

</html>