<?php
    $TITLE = "Welcome -- Bookstore Inc";
    require_once "templates/header.html.php";

    // Prevent showing mysql errors
    //error_reporting(0);
    $connection->select_db("bookstore");
    
    $query = "SELECT isbn,name,author,picture,price,detail FROM book";
    if (isset($_GET["new-releases"]))
        $query = $query . " ORDER BY date_added DESC";
    
    $books = $connection->query($query);
    $tags = null;

    if ($books->num_rows === 0) {
	    echo "0 books found";
    } else {
        $tag_query = "SELECT tag,COUNT(isbn) AS count FROM is_tagged GROUP BY tag ORDER BY count DESC LIMIT 6";
        $tags = $connection->query($tag_query);

        $bestseller_query = "SELECT book, COUNT(book) AS count FROM sales.books_bill GROUP BY book ORDER BY count DESC LIMIT 6";
        $bestsellers = $connection->query($bestseller_query);
    }
?>
<div id="content">
    <div id="content_left">
        <div class="content_left_section">
            <h1>Categories</h1>
            <ul>
                <?
                    while ($tag = $tags->fetch_assoc()) {
                        echo "<li><a href='tag.php?tag={$tag['tag']}'>{$tag['tag']}&nbsp;{$tag['count']}</a>";
                    }
                ?>
            </ul>
        </div>
        <div class="content_left_section">
            <h1>Bestsellers</h1>
            <ul>
                <li><a href="#">Vestibulum ullamcorper</a></li>
                <li><a href="#">Maece nas metus</a></li>
                <li><a href="#">In sed risus ac feli</a></li>
                <li><a href="#">Praesent mattis varius</a></li>
                <li><a href="#">Maece nas metus</a></li>
                <li><a href="#">In sed risus ac feli</a></li>
            </ul>
        </div>
    </div> <!-- end of content left -->

    <div id="content_right">
        <?php
        $count = 1;
        while ($book = $books->fetch_assoc()) {
        ?>
        <div class="product_box">
            <h1><?php echo $book["name"]; ?> <span>(by <?php echo $book["author"]; ?>)</span></h1>
            <img src="<?php echo $book["picture"] ?>" alt="book picture" height="125px" width="100px"/>
            <div class="product_info">
                <p><?php echo substr($book["detail"], 0, 50); ?>...<a href="/details.php?isbn=<?php echo $book["isbn"]; ?>">More</a></p>
                <div class="buy_now_button" id="<?php echo $book["isbn"]; ?>"><a href="#">Buy Now - Rs <?php echo $book["price"]; ?></a></div>
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
