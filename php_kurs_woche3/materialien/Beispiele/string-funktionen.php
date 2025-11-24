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
    // Beispiel-Text
    $text = 'Welt';
    // Die Funktion printf() gibt formatierte Strings aus.
    // %b: Binärzahl, %c: ASCII-Zeichen, %d: Dezimalzahl, %f: Float, %s: String, %x: Hexadezimal
    printf('<p>Ausgabe Typ b (binär): <b>%b</b></p>', 256); // 256 als Binärzahl
    printf('<p>Ausgabe Typ c (ASCII): <b>%c</b></p>', 65); // ASCII-Zeichen für 65 ('A')
    printf('<p>Ausgabe Typ d (dezimal): <b>%d</b></p>', 3); // Dezimalzahl
    printf('<p>Ausgabe Typ f (float): <b>%f</b></p>', 3.65); // Fließkommazahl
    printf('<p>Ausgabe Typ s (string): <b>%s</b> <i>%s</i></p>', 'Hallo ', $text); // Zwei Strings
    printf('<p>Ausgabe Typ x (hex): <b>%x</b></p>', 65); // Hexadezimal

    echo '<h2>Füllzeichen ausgeben</h2>';
    // Füllzeichen mit printf: '*' füllt auf 8 Zeichen auf
    printf("<p>8 Zeichen gefüllt: <b>%'*8s</b></p>", 'Hall');
    // Füllzeichen und Nachkommastellen für Fließkommazahlen
    $zahl1 = 157.549862;
    $zahl2 = 300;
    printf('<p>2 Stellen: <b>%.2f</b></p>', $zahl1); // 2 Nachkommastellen
    printf('<p>4 Stellen: <b>%.4f</b></p>', $zahl1); // 4 Nachkommastellen
    printf('<p>Ganzzahl: <b>%.2f</b></p>', $zahl2); // 2 Nachkommastellen bei Ganzzahl
    printf('<p>6 Zeichen: <b>%08.2f</b></p>', $zahl1); // 8 Zeichen, mit Nullen aufgefüllt
    printf("<p>10 Zeichen: <b>%'X12.3f</b></p>", $zahl1); // 12 Zeichen, mit 'X' gefüllt

    echo '<h2>Die Funktion <code>number_format()</code></h2>';
    // number_format() formatiert Zahlen mit Tausendertrennzeichen und Nachkommastellen
    // Syntax: number_format(Zahl, Nachkommastellen, 'Nachkomma', 'Tausender')
    $zahl = 23456789.7583;
    echo "<p><em>Vorher:</em> $zahl</p>";
    echo '<p><em>Nachher:</em></p>';
    echo '<p>' . number_format($zahl, 2) . '</p>'; // Standard: 2 Nachkommastellen, Komma
    echo '<p>' . number_format($zahl, 2, ',', '.') . '</p>'; // Komma als Nachkomma, Punkt als Tausender
    echo '<p>' . number_format($zahl, 2, ',', ' ') . '</p>'; // Leerzeichen als Tausender
    // sprintf() gibt formatierte Strings zurück (wie printf, aber als Wert)
    echo sprintf('<p>2 Stellen: <b>%.2f</b></p>', $zahl1);

  ?>

  <h2>Zeichenketten-Funktionen</h2>
  <?php
    
    $string = 'brigitte_B@gmail.com';
    echo "<p>Original-Zeichenkette: <b>$string</b></p>";
    // strstr(): Sucht nach Teilzeichenkette und gibt alles ab Fund zurück (Groß-/Kleinschreibung beachten)
    echo "<p><code>strstr()</code>:<br>Suche nach B@ ergibt: " . strstr($string, 'B@'); // findet 'B@'
    echo '<br>Suche nach b@ ergibt: ' . strstr($string, 'b@') . '</p>'; // findet 'b@'
    // stristr(): wie strstr, aber ohne Beachtung der Groß-/Kleinschreibung
    echo '<p>Suche nach b@ ergibt: ' . stristr($string, 'b@') . '</p>';
    // strchr(): Sucht nach Zeichen und gibt alles ab Fund zurück
    echo '<p><code>strchr()</code>:<br>Suche nach i ergibt: ' . strchr($string, 'i');
    echo '<br>Suche nach I ergibt: ' . strchr($string, 'I');
    // stristr(): wie strchr, aber ohne Groß-/Kleinschreibung
    echo '<br>stristr(): Suche nach I ergibt: ' . stristr($string, 'I');
    // strrchr(): Sucht das letzte Vorkommen eines Zeichens
    echo '<br>strrchr(): Suche nach i ergibt: ' . strrchr($string, 'i');

    /* Nach Phrasen innerhalb, am Anfang und am Ende suchen */

    $aHaystack = ['Am Anfang ist alles schwer', 'Einfacher wird es am Ende'];
    $aNeedle = ['Anfang', 'Ende'];

    // str_contains(): Prüft, ob ein Wort in einem Satz enthalten ist
    // str_starts_with(): Prüft, ob ein Satz mit einem Wort beginnt
    // str_ends_with(): Prüft, ob ein Satz mit einem Wort endet
    echo '<table border="1">';
    foreach( $aHaystack as $sString ) {
      foreach( $aNeedle as $sWord ) {
        // Enthält der Satz das Wort?
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
        // Beginnt der Satz mit dem Wort?
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
        // Endet der Satz mit dem Wort?
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
    $pos = strpos($string, '@'); // Position des @-Zeichens
    echo 'Wert von $pos: ' . $pos . '<br>';
    echo '$url: https://www.' . substr( $string, $pos + 1 ) . '</p>';
    $pos = strpos($string2, '@');
    echo '<p>Wert von $pos: ' . $pos . '<br>';
    echo '$url: https://www.' . substr( $string2, $pos + 1 ) . '</p>';
    // strlen(): Länge einer Zeichenkette
    echo "<p>Die Zeichenkette $string hat eine Länge von " . strlen($string) . " Zeichen.</p>";
    echo "<p>Die Zeichenkette $string2 hat eine Länge von " . strlen($string2) . " Zeichen.</p>";
    // substr_count(): Anzahl eines Zeichens in einer Zeichenkette
    echo "<p>Der Buchstabe 'e' kommt in $string " . substr_count($string, 'e') . " mal vor.</p>";
    echo "<p>Der Buchstabe 'e' kommt in $string2 " . substr_count($string2, 'e') . " mal vor.</p>";
    // str_repeat(): Zeichenkette wiederholen
    echo '<p>' . str_repeat('-', 8) . '</p>';
    // trim(), ltrim(), rtrim(): Leerzeichen und Steuerzeichen entfernen
    // Entfernt z.B. \n (Zeilenumbruch), \t (Tabulator), \r (Wagenrücklauf), \0 (Nullbyte), \v (vertikaler Tabulator)
    // trim(String [, Zeichenliste]) entfernt Zeichen am Anfang und Ende
    // ltrim(String [, Zeichenliste]) entfernt Zeichen am Anfang
    // rtrim(String [, Zeichenliste]) entfernt Zeichen am Ende
    $string = '           http://www.php.net/                 ';
    echo "Original: <pre>$string</pre>";
    $string = trim($string);
    echo "Bearbeitet: <pre>$string</pre>";

    /* Zeichenketten modifizieren */

    $text = 'im 3. Quartal des Jahres stieg der Umsatz um 20%';

    echo "<p><em>Original:</em> $text</p>";

    $kl = strtolower($text); // Alles klein
    echo "<p><code>strtolower():</code> $kl</p>";

    $gr = strtoupper($text); // Alles groß
    echo "<p><code>strtoupper():</code> $gr</p>";

    $uf = ucfirst($text); // Erstes Zeichen groß
    echo "<p><code>ucfirst():</code> $uf</p>";

    $uw = ucwords($text); // Jedes Wort beginnt groß
    echo "<p><code>ucwords():</code> $uw</p>";


    /* Zeichen oder Zeichenfolgen austauschen
    strtr(String, Zeichen_von [, Zeichen_nach])
    str_replace(String_von, String_nach, String) */

    echo '<p><i>strtr()</i> "Zeichen für Zeichen":</p>';

    $string = '|-----|-----|-----|-----|';
    echo "<p>Vorher: $string";
    echo '<br>Nachher: ' . strtr( $string, '-|', 'x-' ) . '</p>'; // '-' wird zu 'x', '|' zu '-'

    $string = 'Wäre Jörg ein großer Sänger, würde er schöne Lieder singen';
    echo '<p><i>strtr()</i> "flexibel mit Angabe eines Arrays"</p>';
    echo "<p>Vorher: $string";

    $umlaute = array( 'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'ß' => 'ss' );
    
    echo '<br>Nachher: ' . strtr( $string, $umlaute ) . '</p>'; // Umlaute ersetzen

    $string = 'Meine Tante wohnt in Frankreich';
    echo '<p>str_replace()';
    echo "<br>Vorher: $string";

    $string = str_replace('Tante', '<strong>Nichte</strong>', $string); // 'Tante' ersetzen
    echo "<br>Nachher (1): $string";

    $string = str_replace('Frankreich', '<em>Italien</em>', $string); // 'Frankreich' ersetzen
    echo "<br>Nachher (2): $string</p>";


    /* Zeichenketten und Arrays 
    explode(Trennzeichen, String [, Limit])
    wandelt eine Zeichenkette anhand eines zu definierenden Trennzeichens in ein Array um, Mit Limit kann die Anzahl der Array-Einträge limitiert werden */

    $string = 'Elstar;Gala;Jonagold;Boskoop;Delicious';
    echo "<p><b>Zeichenkette: </b> $string</p>";
    echo '<p><b>explode():</b></p>';

    $ausgabe = explode(';', $string, -2); // In Array aufteilen, -2: zwei Einträge weniger
    echo '<pre>', print_r( $ausgabe, true ), '</pre>';

    /* implode(Verbindungszeichen, Array)
    erzeugt aus einem Array eine Zeichenkette, wobei die Array-Einträge anhand des Verbindungszeichens aneinandergereit werden. */

    $ergebnis = implode(' * ', $ausgabe); // Array zu Zeichenkette verbinden
    echo "<p>Die Zeichenkette: $ergebnis</p>";

    /* Alternative zu explode(): str_split(String [, Länge]) */
    $ausgabe = str_split($string, 3); // Alle 3 Zeichen ein neues Array-Element
    echo '<pre>', print_r( $ausgabe, true ), '</pre>';

  ?>
  
</body>
</html>