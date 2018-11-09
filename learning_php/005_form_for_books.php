
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Form</title>
    <style>
        body {
            font-family: sans-serif;
        }
        th, td {
            padding: 0.5rem;
        }
        label, input {
            display:block;
            padding:0.2rem;
        }
        .odd {
            background: slategrey;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <h1>Create a Book Record</h1>
    <form method="POST" action="/005_create_book_record.php">
        <label for="ISBN">ISBN</label>
        <input name="ISBN" type="text">

        <label for="title">Title</label>
        <input name="title" type="text">

        <label for="year">Year</label>
        <input name="year" type="text">

        <label for="author">Author</label>
        <input name="author" type="text">

        <label for="publisher">Publisher</label>
        <input name="publisher" type="text">

        <label for="price">Price</label>
        <input name="price" type="text">

        <label for="image">Image</label>
        <input name="image" type="text">

        <input type="submit" value="Submit">
    </form>
    <br><br>
    <a href="/006_books_index.php">View Books</a>

</body>
</html>