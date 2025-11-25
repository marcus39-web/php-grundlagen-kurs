<?php
/**
 * Übung »u_db_datum«
 * 
 * Zeigen Sie mit einem PHP-Programm aus der oben angegebenen Tabelle 
 * nur noch bestimmte Informationen (Datei u_db_datum.php).
 * 
 * Jetzt sollen alle Festplatten der Hersteller, Typ, Artikelnummer und 
 * erstem Produktionsdatum angezeigt werden, die im ersten Halbjahr 2008 
 * erstmalig produziert wurden, und zwar aufsteigend sortiert nach Datum 
 * (siehe Abbildung 3.14).
 * 
 * Datumsangaben müssen in SQL-Ausdrücken genauso wie Zeichenketten in 
 * Hochkommata notiert werden.
 */

// Fehlerausgabe aktivieren (nur für Entwicklung)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Datenbankverbindung herstellen
try {
    $passwort = 'Legefeld'; // MySQL root Passwort
    
    $pdo = new PDO(
        'mysql:host=localhost;dbname=hardware;charset=utf8mb4',
        'root',
        $passwort,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}

// Funktion zum Formatieren des Datums (wie in zeitl.inc.php)
function db_datum_aus($datum) {
    // Datum von YYYY-MM-DD nach DD.MM.YYYY formatieren
    if (empty($datum)) return '';
    $teile = explode('-', $datum);
    if (count($teile) == 3) {
        return $teile[2] . '.' . $teile[1] . '.' . $teile[0];
    }
    return $datum;
}

// SQL-Abfrage mit Bedingungen:
// - prod >= '2008-01-01' (ab 1. Januar 2008)
// - prod <= '2008-06-30' (bis 30. Juni 2008)
// - sortiert nach prod aufsteigend (ASC)
// Nur die Spalten hersteller, typ, prod, artnummer werden ausgewählt
$sql = "SELECT hersteller, typ, prod, artnummer 
        FROM fp 
        WHERE prod >= '2008-01-01' AND prod <= '2008-06-30' 
        ORDER BY prod ASC";
$stmt = $pdo->query($sql);
$festplatten = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vergleich von Datumsangaben</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .ausgabe {
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <h1>Vergleich von Datumsangaben</h1>
    
    <div class="ausgabe">
        <?php foreach ($festplatten as $fp): ?>
            <?= htmlspecialchars($fp['hersteller']) ?>, 
            <?= htmlspecialchars($fp['typ']) ?>, 
            <?= db_datum_aus($fp['prod']) ?>, 
            <?= htmlspecialchars($fp['artnummer']) ?><br>
        <?php endforeach; ?>
    </div>
</body>
</html>
