<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Assoziatives Array mit Kennzeichen als Schlüssel und Städten als Wert
$kennzeichen = [
    'HH' => 'Hamburg',
    'B' => 'Berlin',
    'S' => 'Stuttgart',
    'F' => 'Frankfurt am Main',
    'HB' => 'Bremen'
];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autokennzeichen und dazugehörige Städte</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Autokennzeichen und Städte</h1>
    
    <table>
        <tr>
            <th>Kennzeichen</th>
            <th>Stadt</th>
        </tr>
        <?php foreach ($kennzeichen as $kz => $stadt): ?>
        <tr>
            <td><?= $kz ?></td>
            <td><?= $stadt ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>