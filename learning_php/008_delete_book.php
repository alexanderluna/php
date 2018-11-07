<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Removed</title>
</head>
<body>
    <?php
    include('_helper/book_manager.php');

    connect_to_database($conn);
    $response = destroy_book($conn, $_GET['ISBN']);

    echo "<h1>Successfully removed $response</h1>";
    ?>
    <a href="/006_books_index.php">Return to Books</a>
</body>
</html>