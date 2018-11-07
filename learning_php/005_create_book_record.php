<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Saved</title>
</head>
<body>
    <h1>Book Saved</h1>
    <hr>
    <?php
    include('_classes/Book.php');
    include('_helper/book_manager.php');

    $host = 'db';
    $user = 'root';
    $pass = 'secret';
    $db = 'Books';

    $conn = new mysqli($host, $user, $pass, $db);

    $book = new Book(
        $_POST['ISBN'],
        $_POST['title'],
        $_POST['year'],
        $_POST['author'],
        $_POST['publisher'],
        $_POST['price']
    );

    connect_to_database($conn);
    insert_book_to_database($book, $conn);

    $conn->close;
    ?>

    <a href="/006_books_index.php">View Books</a>
</body>
</html>
