<?php
declare(strict_types=1);
class Note {
    /* Öffentliche Klassen sollten vermieden werden*/
    // public string $title;
    // public string $content;

    // public function __construct(string $title, string $content) {
    //     $this->title = $title;
    //     $this->content = $content;
    // }   

    //Constructor Property Promotion
    public function __construct(private string $title, private string $content) {
        //
    }

    //Getter Methoden
    public function getTitle()
   {
    return $this->title;
   }

    public function getContent()
    {
        return $this->content;
    }

}


