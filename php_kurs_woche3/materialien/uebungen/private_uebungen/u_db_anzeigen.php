<?php
/**
 * Übung »u_db_anzeigen«
 * 
 * PHP-Programm zur Anzeige aller Datensätze aus der Tabelle fp 
 * in der Datenbank hardware (Übung »u_db_anlegen«).
 * 
 * Es soll die Ausgabe aus Abbildung 3.12 haben.
 * Die Originaldatenbank inklusive der Tabelle nicht zur Verfügung stehen.
 * 
 * Nutzen Sie bei dieser und anderen Übungsaufgaben bei Bedarf 
 * die Datei zeitl.inc.php mit der Funktion db_datum_aus().
 */

// Fehlerausgabe aktivieren (nur für Entwicklung)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Datenbankverbindung herstellen
try {
    // Passwort eingeben - das gleiche wie bei mysql -u root -p
    $passwort = 'Legefeld'; // HIER DEIN MYSQL ROOT PASSWORT EINTRAGEN
    
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

// Alle Datensätze aus der Tabelle fp abrufen
$sql = "SELECT * FROM fp ORDER BY hersteller, typ";
$stmt = $pdo->query($sql);
$festplatten = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datensätze anzeigen</title>
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
    <h1>Datensätze anzeigen</h1>
    
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
