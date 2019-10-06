<?php
    require_once "lib/sanitizers_validators.php";
    $tag = sanitizeName($_GET["tag"]);

    $TITLE = "{$tag} -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("bookstore");
?>

<?php
$tag_query = "SELECT name,description FROM tag WHERE name = '{$tag}'";
$book_query = "SELECT isbn,name,picture,author,price,detail FROM book WHERE isbn IN (SELECT isbn FROM is_tagged WHERE tag = '{$tag}')";

$tags = $connection->query($tag_query);
if ($tags !== false && $tags->num_rows < 1)
    die("FATAL SQL ERROR");
$tags = $tags->fetch_assoc();

$books = $connection->query($book_query);
?>
<div id="content">
    <h1><?php echo $tags["name"]; ?></h1>
    
    <?php echo htmlspecialchars($tags["description"], ENT_COMPAT | ENT_HTML401 | ENT_QUOTES | ENT_IGNORE); ?>

    <div class="cleaner_with_height">&nbsp;</div>

</div> <!-- end of content -->

<hr/> <div class="cleaner_with_height"></div>

<div id="content_right">
        <?php
        $count = 1;
        while ($book = $books->fetch_assoc()) {
        ?>
        <div class="product_box">
            <h1><?php echo $book["name"]; ?> <span>(by <?php echo $book["author"]; ?>)</span></h1>
            <img src="<?php echo $book["picture"] ?>" alt="book picture" height="125px" width="100px"/>
            <div class="product_info">
                <p><?php echo substr($book["detail"], 0, 50); ?>...<a href="/details.php?isbn=<?php echo $book["isbn"]; ?>">More</a> </p>
                <div class="buy_now_button"><a href="/cart.php?add=<?php echo $book["isbn"] ?>">Buy Now - Rs <?php echo $book["price"]; ?></a></div>
                <div class="detail_button"><a href="/details.php?isbn=<?php echo $book["isbn"]; ?>">Detail</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
        <?php
        if (($count % 2) == 1)
            echo "<div class=\"cleaner_with_width\">&nbsp;</div>";
        else
            echo "<div class=\"cleaner_with_height\">&nbsp;</div>";

        $count++;
        }
        ?>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
<?php
require_once "templates/footer.html.php"
?>
