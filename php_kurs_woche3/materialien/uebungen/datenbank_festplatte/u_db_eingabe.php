<?php
// Fehlerausgabe aktivieren (nur Entwicklung)
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

$hersteller = '';
$festplatten = [];
$fehler = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hersteller = trim($_POST['hersteller'] ?? '');
    if (empty($hersteller)) {
        $fehler = 'Bitte geben Sie einen Herstellernamen ein!';
    } else {
        $sql = 'SELECT hersteller, typ, gb, preis, artnummer, prod FROM fp WHERE hersteller = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hersteller]);
        $festplatten = $stmt->fetchAll();
        if (empty($festplatten)) {
            $fehler = 'Keine Festplatten für diesen Hersteller gefunden.';
        }
    }
}
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
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anzeige der Festplatten eines Herstellers</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px; }
        button:hover { background: #388e3c; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; }
        .fehler { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
<div class="container">
    <h1>Anzeige der Festplatten eines Herstellers</h1>
    <form method="post" action="u_db_eingabe.php" id="herstellerForm">
        <div class="form-group">
            <input type="text" id="hersteller" name="hersteller" value="<?= htmlspecialchars($hersteller) ?>" placeholder="Hersteller" required autofocus>
        </div>
        <button type="submit">Senden</button>
        <button type="button" onclick="resetFormAndTable()">Zurücksetzen</button>
    </form>
    <script>
    function resetFormAndTable() {
        document.getElementById('hersteller').value = '';
        var table = document.querySelector('table');
        if (table) table.style.display = 'none';
        var fehlerDiv = document.querySelector('.fehler');
        if (fehlerDiv) fehlerDiv.style.display = 'none';
    }
    </script>
    <?php if ($fehler): ?>
        <div class="fehler"><?= htmlspecialchars($fehler) ?></div>
    <?php endif; ?>
    <?php if (!empty($festplatten)): ?>
        <table>
            <thead>
                <tr>
                    <th>Hersteller</th>
                    <th>Typ</th>
                    <th>GB</th>
                    <th>Preis</th>
                    <th>Artnr.</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($festplatten as $fp): ?>
                    <tr>
                        <td><?= isset($fp['hersteller']) ? htmlspecialchars($fp['hersteller']) : '' ?></td>
                        <td><?= isset($fp['typ']) ? htmlspecialchars($fp['typ']) : '' ?></td>
                        <td><?= isset($fp['gb']) ? htmlspecialchars((string)$fp['gb']) : '' ?></td>
                        <td><?= isset($fp['preis']) ? htmlspecialchars((string)$fp['preis']) : '' ?></td>
                        <td><?= isset($fp['artnummer']) ? htmlspecialchars($fp['artnummer']) : '' ?></td>
                        <td><?= isset($fp['prod']) ? htmlspecialchars($fp['prod']) : '' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>