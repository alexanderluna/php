<?php
class Book {
    public $ISBN;
    public $title;
    public $year;
    public $author;
    public $publisher;
    public $price;

    function __construct($ISBN, $title, $year, $author, $publisher, $price) {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->year = $year;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->price = $price;
    }
};
?>