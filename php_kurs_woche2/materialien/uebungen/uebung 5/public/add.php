<?php
require_once __DIR__ . '/../inc/notes_functions.php';

$notesFile = __DIR__ . '/../data/notes.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    if ($title && $content) {
        $notes = load_notes($notesFile);
        $notes[] = new Note($title, $content);
        save_notes($notesFile, $notes);
    }
}
header('Location: index.php');
exit;
