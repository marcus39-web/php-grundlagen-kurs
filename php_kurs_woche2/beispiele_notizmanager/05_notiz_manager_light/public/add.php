<?php
declare(strict_types=1);
require __DIR__ . "/../inc/tools.php";
$path = __DIR__ . "/../data/notes.json";
$title = $_POST["title"] ?? "";
$content = $_POST["content"] ?? "";
if (trim($title) !== "" && trim($content) !== "") {
  $notes = loadNotes($path);
  $notes[] = ["title" => $title, "content" => $content];
  saveNotes($path, $notes);
}
header("Location: index.php");
