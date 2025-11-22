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
    // Konstaten sind immer public
    // sie können keine anderen Sichtbarkeit annehmen
    // sie sind unabhängig von einzelnen Objekten
    // sie sind insgesamt nur einmal vorhanden

    const TYP = 'Notitz';

    // statische Eigenschaften 
    // sind unabhängig von Objekten
    // sind insgesamt nur einmal voehanden
    // sollten unmittelbaar zu Beginn initalisiert werden
    static $zahl = 0;

    //Constructor Property Promotion
    public function __construct(private readonly int $number, private string $title, private string $content) {
        self::$zahl++;
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


    public function getNumber() {
            return $this->number;
    }

   static function makeCopy(Note $original, int $number, string $title, string $content) {
        $new = new Note($number, $title, $content);
        $new->title = 'Kopie von ' . $original->title;
        return $new;
    }

    function __toString() {
        return "__toString() -> $this->number: $this->title: $this->content vom Typ " . self::TYP ;
    }

// magische Methode zum Klonen

    function __clone() {
        $this->title = "Klon von " . $this->title;
        self::$zahl++;
    }

    function __destruct() {
        echo '<br>Destruktor';
    }
}

