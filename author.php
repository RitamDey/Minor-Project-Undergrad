<?php
require "lib/author_details.php";
require "database/database.php";

$connection = getConnection();
?>

<html>
<head>
    <title> Book Store </title>
</head>

<body>
<?php
if (!isset($_GET["name"])) {
    echo "<ul>";
    $authors = getAllAuthors($connection);
    while ($author = $authors->fetch_assoc()) {
        echo "<li>\n<div>";
        echo "<a href='author.php?name={$author["name"]}'>";
        echo "<img src='{$author["picture"]}'>";
        echo "<div class='author'>{$author["name"]}</div></a>";
        echo "</div>\n</li>";
    }
    echo "</ul>";
} else {
    $author = getAuthorDetail($connection, $_GET["name"])->fetch_assoc();
    echo "<div class='author-picture'><img src='{$author["picture"]}' alt=''>\n</div>";

    echo "<div class='author-name'>{$author["name"]}</div>";
    echo "<div class='author-detail'>{$author["bio"]}</div>";
    echo "<div class='author-dob'>{$author["dob"]}</div>";
    echo "<div class='author-site'><a href='http://{$author["site"]}'></div>";

    echo "Books published by {$author['name']}\n<div class='author-books'><ul>\n";
    foreach (getAuthorBooks($connection, $author['name']) as $book) {
        echo "<li><div class='book'><a href='details.php?isbn={$book["isbn"]}'>{$book["name"]}</a></div></li>";
    }
    echo "</ul></div>";
}
?>
</body>
</html>