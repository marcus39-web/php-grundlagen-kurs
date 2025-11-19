<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . '/../class/Note.php';

function load_notes(string $file): array {
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    $notes = [];
    
    if (is_array($data)) {
        foreach ($data as $item) {
            if (isset($item['title'], $item['content'])) {
                $notes[] = new Note($item['title'], $item['content']);
            }
        }
    }
    return $notes;
}

function save_notes(string $file, array $notes): void {
    $arr = array_map(function($note) {
        return ['title' => $note->title, 'content' => $note->content];
    }, $notes);

    $result = @file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    if ($result === false) {
        die('<div style="color:red;font-weight:bold;">Fehler: Konnte nicht in ' . htmlspecialchars($file) . ' schreiben!</div>');
    }
}
