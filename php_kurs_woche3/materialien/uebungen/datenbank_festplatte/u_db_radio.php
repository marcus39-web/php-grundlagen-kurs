<?php
/**
 * Übung »u_db_radio«
 * 
 * Zeigen Sie aus der Tabelle fp der Datenbank hardware nur noch Festplatten 
 * aus bestimmten Preisgruppen an (Dateien u_db_radio.htm und u_db_radio.php).
 * 
 * Wie in obigem Beispiel soll mit Radiobuttons und dem match-Ausdruck 
 * gearbeitet werden.
 * 
 * Es gelten die folgenden Preisgruppen:
 * - bis 120 € einschließlich
 * - ab 120 € ausschließlich und bis 140 € einschließlich
 * - ab 140 € ausschließlich
 * 
 * Es sollen nur die Angaben zu Hersteller, Typ und Preis geliefert werden.
 * Zusätzlich soll mithilfe eines Kontrollkästchens entschieden werden können,
 * ob eine Sortierung der Ausgabe nach absteigendem Preis gewünscht ist.
 * 
 * Das Formular soll so aussehen wie in Abbildung 3.18.
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

// Variablen initialisieren
$preisgruppe = isset($_GET['preisgruppe']) ? $_GET['preisgruppe'] : '';
$sortieren = isset($_GET['sortieren']) ? true : false;
$festplatten = [];

// Wenn das Formular abgeschickt wurde
if (!empty($preisgruppe)) {
    // SQL-Bedingung je nach Preisgruppe
    switch ($preisgruppe) {
        case '1': // bis 120 € einschließlich
            $where = "preis <= 120";
            break;
        case '2': // ab 120 € ausschließlich und bis 140 € einschließlich
            $where = "preis > 120 AND preis <= 140";
            break;
        case '3': // ab 140 € ausschließlich
            $where = "preis > 140";
            break;
        default:
            $where = "1=1"; // alle anzeigen
    }
    
    // ORDER BY clause
    $order = $sortieren ? "ORDER BY preis DESC" : "";
    
    // SQL-Abfrage zusammenstellen
    $sql = "SELECT hersteller, typ, preis FROM fp WHERE $where $order";
    $stmt = $pdo->query($sql);
    $festplatten = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten auswählen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .formular {
            background: #f5f5f5;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 400px;
        }
        .formular h2 {
            font-size: 1em;
            margin-bottom: 15px;
        }
        .radio-group {
            margin: 10px 0;
        }
        .radio-group label {
            display: block;
            margin: 5px 0;
        }
        .checkbox-group {
            margin: 15px 0;
        }
        .buttons {
            margin-top: 15px;
        }
        button {
            padding: 5px 15px;
            margin-right: 10px;
        }
        .ausgabe {
            margin-top: 20px;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <h1>Daten auswählen</h1>
    
    <div class="formular">
        <form action="u_db_radio.php" method="get">
            <h2>Anzeige der Festplatten aus der Preisgruppe:</h2>
            
            <div class="radio-group">
                <label>
                    <input type="radio" name="preisgruppe" value="1" <?= ($preisgruppe == '1') ? 'checked' : '' ?>>
                    bis 120 € einschl.
                </label>
                <label>
                    <input type="radio" name="preisgruppe" value="2" <?= ($preisgruppe == '2') ? 'checked' : '' ?>>
                    ab 120 € ausschl. bis 140 € einschl.
                </label>
                <label>
                    <input type="radio" name="preisgruppe" value="3" <?= ($preisgruppe == '3') ? 'checked' : '' ?>>
                    ab 140 € ausschl.
                </label>
            </div>
            
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="sortieren" value="1" <?= $sortieren ? 'checked' : '' ?>>
                    Ausgabe nach Preis (absteigend) sortiert
                </label>
            </div>
            
            <div class="buttons">
                <button type="submit">Senden</button>
                <button type="reset">Zurücksetzen</button>
            </div>
        </form>
    </div>
    
    <?php if (!empty($festplatten)): ?>
        <div class="ausgabe">
            <h2>Ergebnis:</h2>
            <?php foreach ($festplatten as $fp): ?>
                <?= htmlspecialchars($fp['hersteller']) ?>, 
                <?= htmlspecialchars($fp['typ']) ?>, 
                <?= htmlspecialchars($fp['preis']) ?> €<br>
            <?php endforeach; ?>
        </div>
    <?php elseif (!empty($preisgruppe)): ?>
        <div class="ausgabe">
            <p>Keine Festplatten in dieser Preisgruppe gefunden.</p>
        </div>
    <?php endif; ?>
</body>
</html>
