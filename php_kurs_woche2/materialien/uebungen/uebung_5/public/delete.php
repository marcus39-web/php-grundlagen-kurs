<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../inc/tools.php';
$notesFile = __DIR__ . '/../data/notes.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? -1);
    $notes = load_notes($notesFile);
    if (isset($notes[$id])) {
        array_splice($notes, $id, 1);
        save_notes($notesFile, $notes);
    }
}
header('Location: index.php');
exit;
