<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String-Funktionen</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <h1>Zeichenketten-Funktionen</h1>
  <h2>Zeichenketten formatieren</h2>

  <?php
    $text = 'Welt';
    
    /* Die Funktion printf()
    Synthax: printf(Formatierung [, Argument1 [, Argument2, ...]]) */
    
    printf('<p>Ausgabe Typ b: <b>%b</b></p>', 256);
    printf('<p>Ausgabe Typ c: <b>%c</b></p>', 65);
    printf('<p>Ausgabe Typ d: <b>%d</b></p>', 3);
    printf('<p>Ausgabe Typ f: <b>%f</b></p>', 3.65);
    printf('<p>Ausgabe Typ s: <b>%s</b> <i>%s</i></p>', 'Hallo ', $text);
    printf('<p>Ausgabe Typ x: <b>%x</b></p>', 65);


    echo '<h2>Füllzeichen ausgeben</h2>';
    /* Füllzeichen ausgeben */
    printf("<p>8 Zeichen gefüllt: <b>%'*8s</b></p>", 'Hall');

    /* Füllzeichen für Floats */
    $zahl1 = 157.549862;
    $zahl2 = 300;

    printf('<p>2 Stellen: <b>%.2f</b></p>', $zahl1);
    printf('<p>4 Stellen: <b>%.4f</b></p>', $zahl1);
    printf('<p>Ganzzahl: <b>%.2f</b></p>', $zahl2);
    printf('<p>6 Zeichen: <b>%08.2f</b></p>', $zahl1);
    printf("<p>10 Zeichen: <b>%'X12.3f</b></p>", $zahl1);

    echo '<h2>Die Funktion <code>number_format()</code></h2>';
    /* Die Funktion number_format()
    Synthax: number_format(Zahl, Stellen, 'Nachkomma', 'Tausender') */

    $zahl = 23456789.7583;

    echo "<p><em>Vorher:</em> $zahl</p>";
    echo '<p><em>Nachher:</em></p>';
    echo '<p>' . number_format($zahl, 2) . '</p>';
    echo '<p>' . number_format($zahl, 2, ',', '.') . '</p>';
    echo '<p>' . number_format($zahl, 2, ',', ' ') . '</p>';

    /* Rückgabe von Zeichenketten */
    echo sprintf('<p>2 Stellen: <b>%.2f</b></p>', $zahl1);

  ?>

  <h2>Zeichenketten-Funktionen</h2>
  <?php
    
    $string = 'brigitte_B@gmail.com';

    echo "<p>Original-Zeichenkette: <b>$string</b></p>";

    /* Finde eine Zeichenkette */
    echo "<p><code>strstr()</code>:<br>Suche nach B@ ergibt: " . strstr($string, 'B@');
    echo '<br>Suche nach b@ ergibt: ' . strstr($string, 'b@') . '</p>';

    echo '<p>Suche nach b@ ergibt: ' . stristr($string, 'b@') . '</p>';

    /* Finde ein Zeichen */
    echo '<p><code>strchr()</code>:<br>Suche nach i ergibt: ' . strchr($string, 'i');
    echo '<br>Suche nach I ergibt: ' . strchr($string, 'I');

    echo '<br>stristr(): Suche nach I ergibt: ' . stristr($string, 'I');
    echo '<br>strrchr(): Suche nach i ergibt: ' . strrchr($string, 'i');

    /* Nach Phrasen innerhalb, am Anfang und am Ende suchen */

    $aHaystack = ['Am Anfang ist alles schwer', 'Einfacher wird es am Ende'];
    $aNeedle = ['Anfang', 'Ende'];

    echo '<table border="1">';

    foreach( $aHaystack as $sString ) {
      /* Erste Schleife durchläuft das Array mit den Sätzen */

      foreach( $aNeedle as $sWord ) {
        /* Zweite Schleife durchläuft dann das Array mit den Suchworten */

        if( str_contains( $sString, $sWord ) ) {
          $sErgebnis = 'JA';
        } else {
          $sErgebnis = 'NEIN';
        }

        echo '<tr>';
          echo '<td><code>str_contains</code></td>';
          echo "<td>$sString</td>";
          echo "<td>$sWord</td>";
          echo "<td>$sErgebnis</td>";
        echo '</tr>';

        if( str_starts_with( $sString, $sWord ) ) {
          $sErgebnis = 'JA';
        } else {
          $sErgebnis = 'NEIN';
        }

        echo '<tr>';
          echo '<td><code>str_starts_with</code></td>';
          echo "<td>$sString</td>";
          echo "<td>$sWord</td>";
          echo "<td>$sErgebnis</td>";
        echo '</tr>';

        if( str_ends_with( $sString, $sWord ) ) {
          $sErgebnis = 'JA';
        } else {
          $sErgebnis = 'NEIN';
        }

        echo '<tr>';
          echo '<td><code>str_ends_with</code></td>';
          echo "<td>$sString</td>";
          echo "<td>$sWord</td>";
          echo "<td>$sErgebnis</td>";
        echo '</tr>';
      }
    }

    echo '</table>';


    /* Position eines Zeichens liefern
    strpos(Heuhaufen, Zeichen [, Start der Suche]) */

    /* Teil-Zeichenkette bestimmen
    substr(String, Start [, Länge]) */

    $string = 'webmaster@php.net';
    $string2 = 'info@abc.de';

    /* Aufgabe: die URL aus der Mail-Adresse auslesen und mit Protokoll ausgeben */
    echo "<p>Mailadressen: $string, $string2<br>";

    $pos = strpos($string, '@');

    echo 'Wert von $pos: ' . $pos . '<br>';
    echo '$url: https://www.' . substr( $string, $pos + 1 ) . '</p>';
    
    $pos = strpos($string2, '@');

    echo '<p>Wert von $pos: ' . $pos . '<br>';
    echo '$url: https://www.' . substr( $string2, $pos + 1 ) . '</p>';


    /* Länge der Zeichenkette mit strlen(String) */
    echo "<p>Die Zeichenkette $string hat eine Länge von " . strlen($string) . " Zeichen.</p>";
    echo "<p>Die Zeichenkette $string2 hat eine Länge von " . strlen($string2) . " Zeichen.</p>";

    /* Anzahl der gefundenen Suchergebnisse ausgeben */
    echo "<p>Der Buchstabe 'e' kommt in $string " . substr_count($string, 'e') . " mal vor.</p>";
    echo "<p>Der Buchstabe 'e' kommt in $string2 " . substr_count($string2, 'e') . " mal vor.</p>";

    /* Zeichenketten wiederholen */
    echo '<p>' . str_repeat('-', 8) . '</p>';

    /* Leerraum oder andere Zeichen entfernen
    folgende Zeichen werden entfernt:
    \n (Zeilenumbruch)
    \t (Tabulator)
    \r (Wagenrücklauf)
    \0 (0 Byte-Zeichen)
    \v (vertikaler Tabulator)

    trim(String [, Zeichenliste])   entfernt die Zeichen vor und nach dem String
    ltrim(String [, Zeichenliste])  entfernt die Zeichen links vom String (Anfang)
    rtrim(String [, Zeichenliste])  entfernt die Zeichen rechts vom String (Ende)

    über den optionalen Parameter 'Zeichenliste' können weitere Zeichen angegeben werden, die ebenfalls entfernt werden.
    */

    $string = '           http://www.php.net/                 ';
    echo "Original: <pre>$string</pre>";
    $string = trim($string);
    echo "Bearbeitet: <pre>$string</pre>";

    /* Zeichenketten modifizieren */

    $text = 'im 3. Quartal des Jahres stieg der Umsatz um 20%';

    echo "<p><em>Original:</em> $text</p>";

    $kl = strtolower($text);
    echo "<p><code>strtolower():</code> $kl</p>";

    $gr = strtoupper($text);
    echo "<p><code>strtoupper():</code> $gr</p>";

    $uf = ucfirst($text);
    echo "<p><code>ucfirst():</code> $uf</p>";

    $uw = ucwords($text);
    echo "<p><code>ucwords():</code> $uw</p>";


    /* Zeichen oder Zeichenfolgen austauschen
    strtr(String, Zeichen_von [, Zeichen_nach])
    str_replace(String_von, String_nach, String) */

    echo '<p><i>strtr()</i> "Zeichen für Zeichen":</p>';

    $string = '|-----|-----|-----|-----|';
    echo "<p>Vorher: $string";
    echo '<br>Nachher: ' . strtr( $string, '-|', 'x-' ) . '</p>';

    $string = 'Wäre Jörg ein großer Sänger, würde er schöne Lieder singen';
    echo '<p><i>strtr()</i> "flexibel mit Angabe eines Arrays"</p>';
    echo "<p>Vorher: $string";

    $umlaute = array( 'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'ß' => 'ss' );
    
    echo '<br>Nachher: ' . strtr( $string, $umlaute ) . '</p>';

    $string = 'Meine Tante wohnt in Frankreich';
    echo '<p>str_replace()';
    echo "<br>Vorher: $string";

    $string = str_replace('Tante', '<strong>Nichte</strong>', $string);
    echo "<br>Nachher (1): $string";

    $string = str_replace('Frankreich', '<em>Italien</em>', $string);
    echo "<br>Nachher (2): $string</p>";


    /* Zeichenketten und Arrays 
    explode(Trennzeichen, String [, Limit])
    wandelt eine Zeichenkette anhand eines zu definierenden Trennzeichens in ein Array um, Mit Limit kann die Anzahl der Array-Einträge limitiert werden */

    $string = 'Elstar;Gala;Jonagold;Boskoop;Delicious';
    echo "<p><b>Zeichenkette: </b> $string</p>";
    echo '<p><b>explode():</b></p>';

    $ausgabe = explode(';', $string, -2);
    echo '<pre>', print_r( $ausgabe, true ), '</pre>';

    /* implode(Verbindungszeichen, Array)
    erzeugt aus einem Array eine Zeichenkette, wobei die Array-Einträge anhand des Verbindungszeichens aneinandergereit werden. */

    $ergebnis = implode(' * ', $ausgabe);
    echo "<p>Die Zeichenkette: $ergebnis</p>";

    /* Alternative zu explode(): str_split(String [, Länge]) */
    $ausgabe = str_split($string, 3);
    echo '<pre>', print_r( $ausgabe, true ), '</pre>';

  ?>
  
</body>
</html>