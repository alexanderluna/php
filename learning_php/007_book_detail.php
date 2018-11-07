<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Detail</title>
</head>
<body>
    <h1>Alexander's Book Corner</h1>
    <?php
    include('_helper/book_manager.php');

    connect_to_database($conn);
    $book = get_book($conn, $_GET['ISBN']);
    display_book($book);
    ?>
    <a href="/006_books_index.php">View Books</a>
</body>
</html>