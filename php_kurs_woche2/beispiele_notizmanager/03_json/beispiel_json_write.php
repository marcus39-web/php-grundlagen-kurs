<?php
declare(strict_types=1);
$notes = [
  ["title" => "Test", "content" => "Hallo JSON!"]
];
file_put_contents(__DIR__ . "/notes.json", json_encode($notes, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
echo "notes.json geschrieben.";
