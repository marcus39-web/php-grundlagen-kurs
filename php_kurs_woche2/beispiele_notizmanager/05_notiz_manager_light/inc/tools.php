<?php
declare(strict_types=1);
function loadNotes(string $file): array {
  if (!is_file($file)) return [];
  $json = (string)file_get_contents($file);
  $data = json_decode($json, true);
  return is_array($data) ? $data : [];
}
function saveNotes(string $file, array $notes): void {
  file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
}
function safe(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8"); }
