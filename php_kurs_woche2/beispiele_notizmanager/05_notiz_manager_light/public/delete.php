<?php
declare(strict_types=1);
require __DIR__ . "/../inc/tools.php";
$path = __DIR__ . "/../data/notes.json";
$idx = isset($_POST["idx"]) ? (int)$_POST["idx"] : -1;
$notes = loadNotes($path);
if ($idx >= 0 && $idx < count($notes)) {
  array_splice($notes, $idx, 1);
  saveNotes($path, $notes);
}
header("Location: index.php");
