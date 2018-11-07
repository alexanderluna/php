<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <style>
        body {
            font-family: sans-serif;
        }
        th, td {
            padding: 0.5rem;
        }
        a {
            text-decoration: none;
            font-weight: 100;
        }
        .odd {
            background: slategrey;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <?php
    include('_helper/book_manager.php');

    connect_to_database($conn);
    $books = get_books($conn);
    display_books($books);

    $conn->close;
    ?>
    <br><br>
    <a href="/005_form_for_books.php">Add Book</a>
</body>
</html>