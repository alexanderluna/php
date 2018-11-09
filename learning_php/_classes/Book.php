<?php
class Book {
    public $ISBN;
    public $title;
    public $year;
    public $author;
    public $publisher;
    public $price;
    public $image;

    function __construct($ISBN, $title, $year, $author, $publisher, $price, $image) {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->year = $year;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->price = $price;
        $this->image = $image;
    }
};
?>