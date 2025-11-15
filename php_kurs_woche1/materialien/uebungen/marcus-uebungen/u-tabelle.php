<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Übung 3 u_tabelle</title>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 2px;
            margin: 20px;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
            text-align: center;
            width: 30px;
            height: 25px;
        }
    </style>
</head>
<body>
    <h1>Verschachtelte Tabelle</h1>

    <table>
        <?php
        // Verschachtelte for-Schleifen für das kleine Einmaleins in einer Tabelle
        for ($zeile = 1; $zeile <= 10; $zeile++) {
            echo "<tr>";
            for ($spalte = 1; $spalte <= 10; $spalte++) {
                $ergebnis = $zeile * $spalte;
                echo "<td>" . $ergebnis . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    
</body>
</html>