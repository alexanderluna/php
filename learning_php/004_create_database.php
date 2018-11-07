<?php

include('_classes/Book.php');
include('_helper/book_manager.php');

$host = 'db';
$user = 'root';
$pass = 'secret';

$conn = new mysqli($host, $user, $pass);

$joy_of_php = new Book(
    'B00BALXN70',
    'The Joy of PHP',
    2012,
    'Alan Forbes',
    'Plum Island Publishing LLC',
    18.98
);

$my_book = new Book (
    'B0SKALXN70',
    'My Awesome Book',
    2018,
    'Alexander Luna',
    'Alexander LLC',
    9.99
);

connect_to_database($conn);
create_database($conn);
create_inventory_table($conn);

insert_book_to_database($joy_of_php, $conn);
insert_book_to_database($my_book, $conn);

$conn->close();

?>