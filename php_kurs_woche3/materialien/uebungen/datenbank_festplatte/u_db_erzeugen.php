<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('u_db_erzeugen.inc.php'); // Prüffunktionen einbinden

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

$meldung = '';
$fehler = '';

// Initialisiere Felder
$hersteller = '';
$typ = '';
$gb = '';
$preis = '';
$artnummer = '';
$prod = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hersteller = trim($_POST['hersteller'] ?? '');
    $typ = trim($_POST['typ'] ?? '');
    $gb = trim($_POST['gb'] ?? '');
    $preis = trim($_POST['preis'] ?? '');
    $artnummer = trim($_POST['artnummer'] ?? '');
    $prod = trim($_POST['prod'] ?? '');

    // Validierung mit Prüffunktionen
    if (!pruefeHersteller($hersteller)) {
        $fehler .= 'Hersteller ungültig.<br>';
    }
    if (!pruefeTyp($typ)) {
        $fehler .= 'Typ ungültig.<br>';
    }
    if (!pruefeGB($gb)) {
        $fehler .= 'GB ungültig.<br>';
    }
    if (!pruefePreis($preis)) {
        $fehler .= 'Preis ungültig.<br>';
    }
    if (!pruefeArtnummer($artnummer)) {
        $fehler .= 'Artikelnummer ungültig.<br>';
    }
    if (!pruefeDatum($prod)) {
        $fehler .= 'Datum ungültig.<br>';
    }

    if (empty($fehler)) {
        // Datensatz einfügen
        $sql = 'INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hersteller, $typ, $gb, $preis, $artnummer, $prod]);
        $meldung = 'Datensatz erfolgreich hinzugefügt!';
        // Felder zurücksetzen
        $hersteller = $typ = $gb = $preis = $artnummer = $prod = '';
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Datensätze erzeugen </title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        .form-group { margin-bottom: 10px; }
        label { font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px; }
        button:hover { background: #388e3c; }
        .meldung { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb; }
        .fehler { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Geben Sie bitte einen Datensatz ein<br>und senden Sie das Formular ab:</h1>
    <?php if ($meldung): ?>
        <div class="meldung"><?= $meldung ?></div>
    <?php endif; ?>
    <?php if ($fehler): ?>
        <div class="fehler"><?= $fehler ?></div>
    <?php endif; ?>
    <form method="post" action="u_db erzeugen.php" id="datensatzForm">
        <div class="form-group">
            <input type="text" name="hersteller" value="<?= htmlspecialchars($hersteller) ?>" placeholder="Hersteller">
        </div>
        <div class="form-group">
            <input type="text" name="typ" value="<?= htmlspecialchars($typ) ?>" placeholder="Typ">
        </div>
        <div class="form-group">
            <input type="text" name="gb" value="<?= htmlspecialchars($gb) ?>" placeholder="GB">
        </div>
        <div class="form-group">
            <input type="text" name="preis" value="<?= htmlspecialchars($preis) ?>" placeholder="Preis (Nachkommastellen mit Punkt)">
        </div>
        <div class="form-group">
            <input type="text" name="artnummer" value="<?= htmlspecialchars($artnummer) ?>" placeholder="Artikelnummer">
        </div>
        <div class="form-group">
            <input type="text" name="prod" value="<?= htmlspecialchars($prod) ?>" placeholder="Datum der ersten Produktion (in der Form T.M.JJJJ)">
        </div>
        <button type="submit">Senden</button>
        <button type="button" onclick="resetForm()">Zurücksetzen</button>
    </form>
    <a href="u_db_eingabe.php">Alle anzeigen</a>
</div>
<script>
function resetForm() {
    document.getElementById('datensatzForm').reset();
}
</script>
</body>
</html>