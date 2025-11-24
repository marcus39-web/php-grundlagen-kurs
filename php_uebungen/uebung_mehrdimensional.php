<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Mehrdimensionaler Array für Sportfest
$sportfest = [
    [
        'Beginn' => '09:30 Uhr',
        'Disziplin' => 'Diskuswurf',
        'Ort' => 'Nebenplatz',
        'Bemerkung' => 'Jugendmeisterschaften'
    ],
    [
        'Beginn' => '10:00 Uhr',
        'Disziplin' => '5 km-Lauf',
        'Ort' => 'Stadion - Laufbahn',
        'Bemerkung' => 'Offener Lauf'
    ],
    [
        'Beginn' => '11:00 Uhr',
        'Disziplin' => 'Hallenradball',
        'Ort' => 'Waldgebiet',
        'Bemerkung' => 'Teilnahme ab 18 Jahren'
    ],
    [
        'Beginn' => '12:00 Uhr',
        'Disziplin' => 'Stabhochsprung',
        'Ort' => 'Stadion - Stabhochsprunganlage',
        'Bemerkung' => 'Nur Frauen'
    ]
];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportfest: Startzeiten und Veranstaltungen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #e0e0e0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Sportfest: Startzeiten und Veranstaltungen</h1>
    
    <table>
        <thead>
            <tr>
                <th>Beginn</th>
                <th>Disziplin</th>
                <th>Ort</th>
                <th>Bemerkung</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sportfest as $veranstaltung): ?>
            <tr>
                <td><?= $veranstaltung['Beginn'] ?></td>
                <td><?= $veranstaltung['Disziplin'] ?></td>
                <td><?= $veranstaltung['Ort'] ?></td>
                <td><?= $veranstaltung['Bemerkung'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>
