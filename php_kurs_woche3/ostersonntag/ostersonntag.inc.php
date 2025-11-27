<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
/* Eine Beschreibung der Formel von Gauß:
Ostern fällt im Jahr J auf den (e+D+1)-ten Tag nach dem 21. März, wobei gilt:

d = ((15 + J/100 – J/400 – (8 * J/100 + 13) / 25) mod 30 + 19 * (J mod 19)) mod 30
   Falls d = 29, ist D = 28.
   Falls d = 28 und J mod 17 >= 11, ist D = 27.
   Falls d weder 28 noch 29, ist D = d.

e = (2 * (J mod 4) + 4 * (J mod 7) + 6 * D + (6 + J/100 – J/400 – 2) mod 7) mod 7

Zur Umsetzung der Formel in einem PHP-Programm gibt es die beiden folgenden Hinweise:

1) "mod" entspricht dem Operator Modulo (%) aus PHP.
   Dies ist also der ganzzahlige Rest einer Division.

2) Alle vorkommenden Divisionen (zum Beispiel J/100) sind Ganzzahldivisionen.
   Die Stellen hinter dem Komma werden dabei abgeschnitten.
   Dazu können Sie seit PHP 7.0 die Funktion intdiv() benutzen. Ein Beispiel:
      Der Ausdruck 1952/100 ergibt den Wert 19.52 (mit Nachkommastellen).
      Der Aufruf intdiv(1952/100) ergibt den Wert 19 ohne Nachkommastellen, also eine Ganzzahldivision. */

function ostersonntag($j, &$t, &$m)
{
   /* Berechnung von d */
   $d = ((15 + intdiv($j, 100) - intdiv($j, 400) - intdiv((8 * intdiv($j, 100) + 13) , 25)) % 30 + 19 * ($j % 19)) % 30;

   /* Berechnung von D */
   if($d==29)                         $D = 28;
   else if($d == 28 && $j%17 >= 11)   $D = 27;
   else                               $D = $d;

   /* Berechnung von e */
   $e = (2 * ($j%4) + 4 * ($j%7) + 6 * $D + (6 + intdiv($j, 100) - intdiv($j, 400) - 2) % 7) % 7;

   /* Berechnung von Tag und Monat, Rückgabe der Werte per Referenz */
   $m = "03";
   $t = 21 + $e + $D + 1;
   if($t > 31)
   {
      $m = "04";
      $t = $t - 31;
   }
   if($t < 10)
      $t = "0" . $t;
}

/* Das Jahr wird über den Parameter $j an die Funktion geliefert.
   $t und $m sind Referenzen für die Variablen für Tag und Monat.
   Die Werte stehen nach dem Aufruf der Funktion an der Aufrufstelle zur Verfügung.

   Innerhalb der Funktion wird das Ergebnis in einzelnen Schritten bestimmt:
      Der Wert von $d wird gemäß der Formel errechnet.
      Der Wert von $D ergibt sich nach einer Verzweigung aus $d.
      Der Wert von $e wird gemäß der Formel errechnet.
      Liegt der errechnete Tag nicht mehr im Monat März, müssen Tag und Monat
         auf den entsprechenden Tag im Monat April umgerechnet werden. Ein Beispiel:
         Aus dem 36.03. wird der 05.04.
      Die Zahlen werden in Text umgewandelt.
      Bei einstelligen Zahlen wird eine Null vorangestellt. */
?>