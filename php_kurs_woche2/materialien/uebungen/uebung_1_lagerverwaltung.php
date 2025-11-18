<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Erstelle ein Inventory-Array mit name, preis, bestand (>=5 Artikel).
 * 2) Berechne den Gesamtwert.
 * 3) Gib alle Artikel formatiert aus.
 */

// 1) Inventory-Array erstellen
$inventory = [
    [
        'name' => 'Laptop',
        'preis' => 899.99,
        'bestand' => 15
    ],
    [
        'name' => 'Maus',
        'preis' => 24.99,
        'bestand' => 50
    ],
    [
        'name' => 'Tastatur',
        'preis' => 79.99,
        'bestand' => 30
    ],
    [
        'name' => 'Monitor',
        'preis' => 299.99,
        'bestand' => 20
    ],
    [
        'name' => 'USB-Kabel',
        'preis' => 9.99,
        'bestand' => 100
    ],
    [
        'name' => 'Headset',
        'preis' => 59.99,
        'bestand' => 25
    ]
];

// 2) Gesamtwert berechnen
$gesamtwert = 0;
foreach ($inventory as $artikel) {
    $gesamtwert += $artikel['preis'] * $artikel['bestand'];
}
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 1 – Lagerverwaltung</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 1 – Lagerverwaltung</h1></header>
  <main class="container" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 800px; width: 100%;">
      <h2 style="text-align: center; margin-bottom: 1.5rem;">Lagerbestand</h2>
      <table style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th style="text-align: left; padding: 0.75rem; border-bottom: 2px solid #ddd;">Artikel</th>
            <th style="text-align: right; padding: 0.75rem; border-bottom: 2px solid #ddd;">Preis</th>
            <th style="text-align: center; padding: 0.75rem; border-bottom: 2px solid #ddd;">Bestand</th>
            <th style="text-align: right; padding: 0.75rem; border-bottom: 2px solid #ddd;">Warenwert</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($inventory as $artikel): ?>
            <tr>
              <td style="padding: 0.75rem; border-bottom: 1px solid #eee;"><?= htmlspecialchars($artikel['name']) ?></td>
              <td style="text-align: right; padding: 0.75rem; border-bottom: 1px solid #eee;"><?= number_format($artikel['preis'], 2, ',', '.') ?> €</td>
              <td style="text-align: center; padding: 0.75rem; border-bottom: 1px solid #eee;"><?= $artikel['bestand'] ?> Stück</td>
              <td style="text-align: right; padding: 0.75rem; border-bottom: 1px solid #eee;"><?= number_format($artikel['preis'] * $artikel['bestand'], 2, ',', '.') ?> €</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr style="background: #f8f9fa;">
            <td colspan="3" style="padding: 1rem; border-top: 2px solid #ddd;"><strong>Gesamtwert Lager:</strong></td>
            <td style="text-align: right; padding: 1rem; border-top: 2px solid #ddd;"><strong><?= number_format($gesamtwert, 2, ',', '.') ?> €</strong></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </main>
</body>
</html>
