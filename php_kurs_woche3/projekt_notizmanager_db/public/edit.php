<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
 
    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';
 
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $note = $id ? findNote($pdo, $id) : null;
   
    //wenn $note null ist,
    if(!$note) {
        header('Location: index.php');
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eintrag bearbeiten</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Eintrag bearbeiten</h1>
        </div>
    </header>
    <main class="container">
        <section class="card">
            <form action="update.php" method="post">
                <input type="hiddle" name="id" value="<?= (int)$note->id ?>">
                <label for="">Titel <input type="text" name="title" value="<?= safe($note->title) ?>"  required></label>
                <label for="">Inhalt <textarea name="content" rows="10" required><?= safe($note->content) ?></textarea></label>
                <label for="">Kategorie
                    <select name="category_id">
                        
                        <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat ): ?>
                            <option value="<?= (int)$cat->id ?>"<?=($note->category_id ?? null)==(int)$cat->id ? ' selected' : '' ?>><?= safe($cat->name) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit">Speichern</button>
                <a href="index.php" class="button">Abbrechen</a>
            </form>
        </section>
    </main>
</body>
</html>
 