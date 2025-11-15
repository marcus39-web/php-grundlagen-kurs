<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung 6 - Funktion mit Parameter</title>
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
        }
    </style>
</head>
<body>
    <h1>Übung 6 - Funktion mit Parameter</h1>

    <?php
    // Funktion mit Entwicklervermerk und Parameter
    function vermerk($name) {
        echo "<tr><td class='vermerk'>Dieser Programmteil wurde geschrieben von $name</td></tr>";
    }
    ?>

    <table>
        <?php vermerk('Bodo Berg'); ?>
        <?php vermerk('Hans Heum'); ?>
        <?php vermerk('Clara Clown'); ?>
        <?php vermerk('Marcus Reiser'); ?>
    </table>
    
</body>
</html>