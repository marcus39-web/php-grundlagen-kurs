<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'artikel.inc.php';
/**
 * Aufgabe:
 * 1) Schreibe eine Funktion brutto($netto, $mwst=0.19).
 * 2) Gib das Ergebnis formatiert (2 Nachkommastellen) aus.
*/

/**
 * Berechnet den Bruttopreis aus Nettopreis und MwSt-Satz
 * @param float $netto Der Nettopreis
 * @param float $mwst Der MwSt-Satz (Standard: 0.19 für 19%)
 * @return float Der Bruttopreis
 */
function brutto(float $netto, float $mwst = 0.19): float {
    return $netto * (1 + $mwst);
}

// Eingabewerte aus Formular holen
$netto = isset($_GET['netto']) ? (float)$_GET['netto'] : 100.00;
$mwst = isset($_GET['mwst']) ? (float)$_GET['mwst'] : 0.19;

// Berechnung durchführen
$brutto = brutto($netto, $mwst);
$mwstBetrag = $brutto - $netto;
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 4 – MwSt.-Funktion</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 4 – MwSt.-Funktion</h1></header>
  <main class="container">
    <!-- Eingabeformular -->
    <form method="get" action="" class="mwst-form">
      <div class="form-group">
        <label for="netto">Nettopreis (€):</label>
        <input type="number" id="netto" name="netto" step="0.01" min="0" value="<?= number_format($netto, 2, '.', ''); ?>" required>
      </div>
      
      <div class="form-group">
        <label for="mwst">MwSt-Satz:</label>
        <select id="mwst" name="mwst">
          <option value="0.19" <?= $mwst == 0.19 ? 'selected' : ''; ?>>19% (Standard)</option>
          <option value="0.07" <?= $mwst == 0.07 ? 'selected' : ''; ?>>7% (ermäßigt)</option>
          <option value="0.16" <?= $mwst == 0.16 ? 'selected' : ''; ?>>16% (Corona 2020)</option>
        </select>
      </div>
      
      <button type="submit">Berechnen</button>
    </form>
    
    <hr>
    
    <!-- Ergebnisanzeige -->
    <div class="result-box">
      <h2>Berechnung:</h2>
      <table class="result-table">
        <tr>
          <td><strong>Nettopreis:</strong></td>
          <td class="amount"><?= number_format($netto, 2, ',', '.'); ?> €</td>
        </tr>
        <tr>
          <td><strong>MwSt (<?= ($mwst * 100); ?>%):</strong></td>
          <td class="amount">+ <?= number_format($mwstBetrag, 2, ',', '.'); ?> €</td>
        </tr>
        <tr class="total">
          <td><strong>Bruttopreis:</strong></td>
          <td class="amount"><strong><?= number_format($brutto, 2, ',', '.'); ?> €</strong></td>
        </tr>
      </table>
    </div>
  </main>
  
  <style>
    .container {
      max-width: 500px;
      margin: 0 auto;
    }
    .mwst-form {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .form-group {
      margin-bottom: 10px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      font-size: 14px;
    }
    .form-group input,
    .form-group select {
      padding: 8px;
      font-size: 14px;
      border: 2px solid #ddd;
      border-radius: 4px;
      width: 100%;
      max-width: 250px;
    }
    button {
      padding: 8px 20px;
      font-size: 14px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 5px;
    }
    button:hover {
      background-color: #218838;
    }
    .result-box {
      background-color: #e9ecef;
      padding: 15px;
      border-radius: 8px;
    }
    .result-box h2 {
      margin-top: 0;
      color: #333;
      font-size: 18px;
    }
    .result-table {
      width: 100%;
      max-width: 350px;
      border-collapse: collapse;
      font-size: 14px;
    }
    .result-table td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    .result-table .amount {
      text-align: right;
    }
    .result-table .total {
      border-top: 2px solid #333;
      font-size: 1.1em;
    }
    .result-table .total td {
      padding-top: 10px;
      border-bottom: none;
    }
  </style>
</html>
