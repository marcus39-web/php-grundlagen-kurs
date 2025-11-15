<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung 5 - Einfache Funktion</title>
    <link rel="stylesheet" href="../../style/style.css">
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
            border: none;
        }
        td {
            padding: 10px 20px;
            border: none;
            font-weight: bold;
            font-size: 1.1em;
        }
        td.vermerk {
            border: 4px double black;
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <h1>Einfache Funktion</h1>

    <?php
    // Funktion mit Entwicklervermerk
    function vermerk($name) {
        echo "<tr><td class='vermerk'>Dieses Programm wurde geschrieben von $name</td></tr>";
    }
    ?>

    <table>
        <tr><td>Anfang des Programms</td></tr>
        <?php vermerk('Bodo Berg'); ?>
        <tr><td>Mitte des Programms</td></tr>
        <?php vermerk('Bodo Berg'); ?>
        <tr><td>Ende des Programms</td></tr>
    </table>
    
</body>
</html>