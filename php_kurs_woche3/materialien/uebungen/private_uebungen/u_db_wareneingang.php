<?php
/**
 * Wareneingang - Formular zur Erhöhung der Lagerbestände
 * 
 * Ermöglicht das Buchen von Wareneingängen durch Eingabe von
 * Artikelnummer und Menge. Die Menge wird zum bestehenden Bestand addiert.
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

// Variablen für Formular und Meldungen
$meldung = '';
$fehler = '';
$artnummer = '';
$menge = '';

// Formular wurde abgeschickt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artnummer = trim($_POST['artnummer'] ?? '');
    $menge = trim($_POST['menge'] ?? '');
    
    // Validierung
    if (empty($artnummer)) {
        $fehler = 'Bitte Artikelnummer eingeben!';
    } elseif (empty($menge) || !is_numeric($menge) || $menge <= 0) {
        $fehler = 'Bitte gültige Menge eingeben (größer als 0)!';
    } else {
        // Prüfen, ob Artikel existiert
        $sql = "SELECT artnummer, hersteller, typ, Bestand FROM fp WHERE artnummer = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$artnummer]);
        $artikel = $stmt->fetch();
        
        if (!$artikel) {
            $fehler = "Artikel mit Artikelnummer '$artnummer' nicht gefunden!";
        } else {
            // Menge zum Bestand addieren
            $neuer_bestand = ($artikel['Bestand'] ?? 0) + intval($menge);
            
            $sql_update = "UPDATE fp SET Bestand = ? WHERE artnummer = ?";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute([$neuer_bestand, $artnummer]);
            
            $meldung = "Wareneingang erfolgreich gebucht!<br>";
            $meldung .= "Datum/Uhrzeit: " . date('d.m.Y H:i:s') . "<br>";
            $meldung .= "Artikel: {$artikel['hersteller']} {$artikel['typ']}<br>";
            $meldung .= "Alter Bestand: " . ($artikel['Bestand'] ?? 0) . "<br>";
            $meldung .= "Zugang: $menge<br>";
            $meldung .= "Neuer Bestand: $neuer_bestand";
            
            // Formular zurücksetzen
            $artnummer = '';
            $menge = '';
        }
    }
}

// Alle Artikel für Übersicht laden
$sql_alle = "SELECT artnummer, hersteller, typ, Bestand FROM fp ORDER BY artnummer";
$stmt_alle = $pdo->query($sql_alle);
$alle_artikel = $stmt_alle->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wareneingang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .formular {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #45a049;
        }
        .meldung {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .fehler {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        .artikel-liste {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f8f9fa;
            font-weight: bold;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .bestand-niedrig {
            color: #d32f2f;
            font-weight: bold;
        }
        .bestand-ok {
            color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 Wareneingang buchen</h1>
        
        <?php if ($meldung): ?>
            <div class="meldung"><?= $meldung ?></div>
        <?php endif; ?>
        
        <?php if ($fehler): ?>
            <div class="fehler"><?= htmlspecialchars($fehler) ?></div>
        <?php endif; ?>
        
        <div class="formular">
            <form method="post" action="u_db_wareneingang.php">
                <div class="form-group">
                    <label for="artnummer">Artikelnummer:</label>
                    <input 
                        type="text" 
                        id="artnummer" 
                        name="artnummer" 
                        value="<?= htmlspecialchars($artnummer) ?>"
                        placeholder="z.B. HDA-140"
                        required
                        autofocus>
                </div>
                
                <div class="form-group">
                    <label for="menge">Menge (Zugang):</label>
                    <input 
                        type="number" 
                        id="menge" 
                        name="menge" 
                        value="<?= htmlspecialchars($menge) ?>"
                        placeholder="z.B. 10"
                        min="1"
                        required>
                </div>
                
                <button type="submit">Wareneingang buchen</button>
            </form>
        </div>
        
        <div class="artikel-liste">
            <h2>Aktueller Lagerbestand</h2>
            <table>
                <thead>
                    <tr>
                        <th>Artikelnr.</th>
                        <th>Hersteller</th>
                        <th>Typ</th>
                        <th>Bestand</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alle_artikel as $artikel): ?>
                        <tr>
                            <td><?= htmlspecialchars($artikel['artnummer']) ?></td>
                            <td><?= htmlspecialchars($artikel['hersteller']) ?></td>
                            <td><?= htmlspecialchars($artikel['typ']) ?></td>
                            <td class="<?= ($artikel['Bestand'] ?? 0) < 5 ? 'bestand-niedrig' : 'bestand-ok' ?>">
                                <?= htmlspecialchars($artikel['Bestand'] ?? 0) ?> Stück
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
