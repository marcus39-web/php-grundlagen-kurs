<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 'true');

file_put_contents(__DIR__.'/addphp.log', 'ADD.PHP WIRD AUSGEFÜHRT' . PHP_EOL, FILE_APPEND);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/../inc/tools.php';
$notesFile = __DIR__ . '/../data/notes.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    if ($title && $content) {
        $notes = load_notes($notesFile);
        $notes[] = new Note($title, $content);
        save_notes($notesFile, $notes);
        file_put_contents('/tmp/addphp.log', 'SPEICHERN: ' . $notesFile . PHP_EOL, FILE_APPEND);
    }
}
header('Location: index.php');
exit;
