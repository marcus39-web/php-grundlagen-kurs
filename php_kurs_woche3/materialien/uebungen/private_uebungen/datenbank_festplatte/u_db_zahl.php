<?php
/**
 * Übung »u_db_zahl«
 * 
 * Zeigen Sie mit einem PHP-Programm aus der oben angegebenen Tabelle 
 * nur noch bestimmte Datensätze (Datei u_db_zahl.php).
 * 
 * Es soll die Ausgabe aus Abbildung 3.13 erzeugen: alle Arg (Datensätze)
 * derjenigen Festplatten angezeigt werden, die einen maximalen Speicherplatz
 * von mehr als 60 GByte haben und weniger als 150 € kosten, und zwar nach 
 * maximalem Speicherplatz absteigend sortiert.
 */

// Fehlerausgabe aktivieren (nur für Entwicklung)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Datenbankverbindung herstellen
try {
    $passwort = 'Legefeld'; // MySQL root Passwort
    
    $pdo = new PDO(
        'mysql:host=localhost;dbname=hardware;charset=utf8mb4',
        'user_php',
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
// - gb > 60 (mehr als 60 GByte)
// - preis < 150 (weniger als 150 Euro)
// - sortiert nach gb absteigend (DESC)
$sql = "SELECT * FROM fp WHERE gb > 60 AND preis < 150 ORDER BY gb DESC";
$stmt = $pdo->query($sql);
$festplatten = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehrere Bedingungen</title>
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
    <h1>Mehrere Bedingungen</h1>
    
    <div class="ausgabe">
        <?php foreach ($festplatten as $fp): ?>
            <?= htmlspecialchars($fp['hersteller']) ?>, 
            <?= htmlspecialchars($fp['typ']) ?>, 
            <?= htmlspecialchars($fp['gb']) ?>, 
            <?= htmlspecialchars($fp['preis']) ?>, 
            <?= db_datum_aus($fp['prod']) ?>, 
            <?= htmlspecialchars($fp['artnummer']) ?><br>
        <?php endforeach; ?>
    </div>
</body>
</html>
