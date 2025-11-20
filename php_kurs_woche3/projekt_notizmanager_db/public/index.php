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
            <form action="add.php" method="post">
                <label>Titel <input type="text" name="title" required></label>
                <label>Inhalt <textarea name="content" rows="10" required></textarea></label>
                <lable>Kategorie
                    <select name="category_id">
                        <option value="" disabled selected>- keine -</option>
                        <?php foreach($pdo->query('SELECT id, name FROM categories ORDER BY name') as $category): ?>
                            <option value="<?= (int)$category->id ?>"><?= safe($category->name) ?></option>
                            <?php endforeach ?>
                    </select>
                </lable>
                <button type="submit" >Speichern</button>
            </form>
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
                            <td><?= safe($n->title) ?></td>
                            <td><?= safe($n->category) ?></td>
                            <td><?= safe($n->created_at) ?></td>
                            <td>
                                <a href="edit.php?id=<?= (int)$n->id ?>" class="button">Bearbeiten</a>
                                <form action="delete.php" style="display:inline;" method="post"></form>
                                    <input type="hidden" name="id" value="<?= (int)$n->id ?>">
                                    <button type="submit" class="text-danger');">Löschen</button>
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
 