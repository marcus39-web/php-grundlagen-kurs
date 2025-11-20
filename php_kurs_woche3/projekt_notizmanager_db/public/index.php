<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
 
    session_start();
 
    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';
 
    $notes = getAllNotes($pdo);
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notiz-Manage DB</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Notiz-Manager DB</h1>
            <div class="text-muted">
                Manage User Login
            </div>
        </div>
    </header>
    <main class="container">
        <section class="card">
            <h2>Neue Notiz</h2>
            Formular für neue Notizen
        </section>
        <section class="card">
            <h2>Einträge</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Kategorie</th>
                        <th>Datum</th>
                        <th>Aktionen</th>
                    </tr>
                </thead>
                    <?php foreach ($notes as $n): ?>
                        <tr>
                            <td><?= $n->title ?></td>
                            <td><?= $n->category ?></td>
                            <td><?= $n->created_at ?></td>
                            <td>
                                <a href="edit.php?id=<?= (int)$n->id ?>" class="button">Bearbeiten</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <tbody>
                       
                   
                </tbody>
            </table>
        </section>
    </main>    
</body>
</html>
 