<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

class Note {
    public string $title;
    public string $content;

    public function __construct(string $title, string $content) {
        $this->title = $title;
        $this->content = $content;
    }
}
