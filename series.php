<?php
require "database/database.php";
require "lib/sanitizers_validators.php";
$connection = getConnection();
?>
<html>
<head>
<title> Book Store </title>
</head>

<body>
<?php
$name = sanitizeName($_GET["series"]);
$query = "SELECT title,description,author,publisher FROM bookstore.series WHERE title = '{$name}'";
$series = $connection->query($query)->fetch_assoc();
?>
<div class="title">
    <h1><?php echo $series["title"]; ?></h1>
</div> <div class="description">
    <p><?php echo $series["description"]; ?></p>
</div> <br/>


<ul class="book-list">
<?php
$book_query = "SELECT isbn,name,price,picture,book_number FROM bookstore.book WHERE series = '{$series["title"]}' ORDER BY book_number";
$books = $connection->query($book_query);

if ($books->num_rows == 0) {
    echo "<h3> No books added to this series! </h3>";
} else {
    echo "<div class='book-list'>";
    while ($book = $books->fetch_assoc()) {
        echo "<div class='book'>";
        echo "<img class='book-picture' src='{$book["picture"]}'><a href='details.php?isbn={$book["isbn"]}'>";
        echo "{$book["name"]}</a><br/>";
        echo "<em class='book-price'>{$book["price"]}</em><hr></div><br/>";
    }
}
?>
</ul>
<style>
    .book-picture {
        width = 25%;
        height: 25%;
    }
    div.book-list a {
        text-align: justify-all;
    }
</style>
</body>
</html>
