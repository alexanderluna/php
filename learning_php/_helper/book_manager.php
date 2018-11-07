<?php

$host = 'db';
$user = 'root';
$pass = 'secret';
$db = 'Books';

$conn = new mysqli($host, $user, $pass, $db);

function connect_to_database($conn) {
    if ($conn->connect_error) {
        die('Could not connect to mysql: '.$conn->connect_error);
    }
    echo 'Connected to mysql successfully';
    echo "MSQL: " . $conn->server_info;;
}

function create_database($conn) {
    if ($conn->query("CREATE DATABASE Books") === TRUE) {
        echo "<p>Database Books created</p>";
    } else {
        echo "Error creating Books database".$conn->error."<br>";
    }    

    $conn->select_db("Books");
    echo "Selected the Books database";
}

function create_inventory_table($conn) {

    $query = "
        Create TABLE INVENTORY
        (
            ISBN VARCHAR(13) PRIMARY KEY,
            Title VARCHAR(50),
            Year INT,
            Author VARCHAR(50),
            Publisher VARCHAR(100),
            Pice DECIMAL(5,2)
        );
    ";

    echo '<p>************</p>';
    echo $query;
    echo '<p>************</p>';

    if ($conn->query($query) === TRUE) {
        echo 'Database table INVENTORY created';
    } else {
        echo '<p>Error:</p>'.$conn->error;
    }
}

function insert_book_to_database($book, $conn) {

    $query = "
        INSERT INTO INVENTORY
        (
            ISBN,
            Title,
            Year,
            Author,
            Publisher,
            Pice  
        )
        VALUES
        (
            '$book->ISBN',
            '$book->title',
            '$book->year',
            '$book->author',
            '$book->publisher',
            '$book->price'
        )
    ";

    echo '<p>************</p>';
    echo $query;
    echo '<p>************</p>';

    if ($conn->query($query) === TRUE) {
        echo "<p>Inserted $book->title into table</p>";
    } else {
        echo "<p>ERROR inserting $book->title</p>".$conn->error;
    }
}

function get_books($conn) {
    $query = "SELECT * FROM INVENTORY;";
    if ($books = $conn->query($query)) {
        echo 'GETTING BOOKS';
    } else {
        echo 'ERROR GETTING BOOKS: ' . $conn->error;
    }
    return $books;
}

function get_book($conn, $ISBN) {
    $query = "SELECT * FROM INVENTORY WHERE ISBN='$ISBN'";
    if ($book = $conn->query($query)) {
        echo 'BOOK FOUND';
    } else {
        echo 'Sorry no Book found with ISBN of ' . $ISBN;
    }
    return $book;
}

function destroy_book($conn, $ISBN) {
    $query = "DELETE FROM INVENTORY WHERE ISBN='$ISBN'";
    if ($book = $conn->query($query)) {
        echo 'BOOK REMOVED';
    } else {
        echo 'ERROR WHILE REMOVING BOOK' . $conn->error;
    }
    return $ISBN;
}

function display_books($books) {
    echo '<br><br>';
    echo '<table id="Grid" style="width:100%"><tr>';
    echo '<th style="width:50px">ISBN</th>';
    echo '<th style="width:50px">Title</th>';
    echo '<th style="width:50px">Year</th>';
    echo '<th style="width:50px">Author</th>';
    echo '<th style="width:50px">Publisher</th>';
    echo '<th style="width:50px">Price</th>';
    echo '<th style="width:50px">Details</th>';
    echo '<th style="width:50px">DELETE</th>';
    echo '</tr>';

    $odd = 'odd';
    while ($book = $books->fetch_assoc()) {
        echo "<tr class='$odd'>";
        echo "<td>" . $book["ISBN"] . "</td>";
        echo "<td>" . $book["Title"] . "</td>";
        echo "<td>" . $book["Year"] . "</td>";
        echo "<td>" . $book["Author"] . "</td>";
        echo "<td>" . $book["Publisher"] . "</td>";
        echo "<td>" . $book["Pice"] . "</td>";
        echo "<td> <a href='007_book_detail.php?ISBN=";
        echo $book["ISBN"];
        echo "'>more info</a></td>"; 
        echo "<td> <a href='008_delete_book.php?ISBN=";
        echo $book["ISBN"];
        echo "'>delete</a></td>"; 
        echo "</td></tr>";

        if ($odd == 'odd') {
            $odd = 'even';
        } else {
            $odd = 'odd';
        }
    }
    echo '</table>';
}

function display_book($book_result) {
    while ($book = $book_result->fetch_assoc()) {
        echo "<p>ISBN: " . $book['ISBN'] . "</p>";
        echo "<p>Title: " . $book['Title'] . "</p>";
        echo "<p>Year: " . $book['Year'] . "</p>";
        echo "<p>Author: " . $book['Author'] . "</p>";
        echo "<p>Publisher: " . $book['Publisher'] . "</p>";
        echo "<p>Price: " . $book['Pice'] . "</p>";
    }
}
?>