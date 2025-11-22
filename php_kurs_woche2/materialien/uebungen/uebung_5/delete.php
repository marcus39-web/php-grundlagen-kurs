<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
// Notiz anhand des Index aus notes.json löschen
$notesFile = __DIR__ . '/data/notes.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idx'])) {
    $idx = (int)$_POST['idx'];
    if (file_exists($notesFile)) {
        $notes = json_decode(file_get_contents($notesFile), true) ?? [];
        if (isset($notes[$idx])) {
            array_splice($notes, $idx, 1);
            file_put_contents($notesFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
