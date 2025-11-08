<?php
declare(strict_types=1);
class Note {
  public string $title;
  public string $content;
  public function __construct(string $title, string $content) {
    $this->title = trim($title);
    $this->content = trim($content);
  }
}
