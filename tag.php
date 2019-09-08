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
$tag = sanitizeName($_GET["tag"]);
echo $tag;
$tag_query = "SELECT name,description FROM bookstore.tag WHERE name = '{$tag}'";
$book_query = "SELECT isbn,name,picture FROM bookstore.book WHERE isbn IN (SELECT isbn FROM bookstore.is_tagged WHERE tag = '{$tag}')";

$tags = $connection->query($tag_query)->fetch_assoc();
$books = $connection->query($book_query);
?>
<div id="tag">
    <div id="tag-name">
        <h2> <?php echo $tags["name"]; ?></h2>
        <div class="tag-description">
            <?php
            echo $tags["description"];
            ?>
        </div>
    </div>
</div>

<?php
echo "<ul>";

while ($book = $books->fetch_assoc()) {
    echo "<li><a href='details.php?isbn={$book["isbn"]}'><img src='{$book["picture"]}' alt=''></a>{$book["name"]}</li>";
}
echo "</ul>";
?>
</body>
</html>
