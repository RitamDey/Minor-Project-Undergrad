<?php
require_once "lib/sanitizers_validators.php";

$name = sanitizeName($_GET["series"]);

$TITLE = "{$name} -- Bookstore Inc";
require_once "templates/header.html.php";

$connection->select_db("bookstore");
$query = "SELECT title,description,author,publisher,picture FROM series WHERE title = '{$name}'";
$series = $connection->query($query);

if ($series->num_rows < 1)
    die("FATAL SQL ERROR");

$series = $series->fetch_assoc();
?>
<div id="content">
    <div id="content_left">
        <div class="image_panel"><img src="<?php echo $series["picture"] ?>" alt="Series Cover" width="175" height="300" /></div>
    </div> <!-- end of content left -->
    
    <div id="content_right">
        
        <h1><?php echo $series["title"]; ?></h1>
        <ul>
            <li>By <a href="author.php?name=<?php echo $series["author"]; ?>"><?php echo $series["author"]; ?></a></li>
            <!-- <li>Published: January 2024</li> -->
            <li>Number of books: <?php
            $count_query = "SELECT COUNT(isbn) AS book_count FROM book WHERE series = '{$series["title"]}'";
            $count = $connection->query($count_query);

            if ($count === false || $count->num_rows < 1)
                echo "<b>Couldn't get number of books</b>";
            
            echo $count->fetch_assoc()['book_count'];
            ?></li>
        </ul>

        <p><?php echo $series["description"]; ?></p>

        <div class="cleaner_with_height">&nbsp;</div>
        
        
    </div> <!-- end of content right -->

    <div class="cleaner_with_height">&nbsp;</div>
</div> <!-- end of content -->

<hr/>
<div class="cleaner_with_height"></div>
<?php
$books_query = "SELECT name,author,isbn,picture,detail,price FROM book WHERE series = '{$series["title"]}'";
$books = $connection->query($books_query);

if ($books === false || $books->num_rows < 1) {
    echo "<b> No books found </b>";
    die();
}

?>

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
require_once "templates/footer.html.php";
?>
