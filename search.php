<?php
    $TITLE = "Search -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("bookstore");

    if (isset($_GET["q"]) === false) {
        //header("Location: /", true, 302);
    }

    $search_term = $_GET["q"];
    $name = null;
    $author = null;
    $isbn = null;
    $picture = null;
    $price = null;
    $detail = null;
    
    // Use prepared statments here. It's better cause it will handle proper quoting of string and the query
    $search = $connection->prepare("SELECT isbn,name,author,picture,price,detail FROM book WHERE (name LIKE CONCAT('%', ?, '%') OR detail LIKE CONCAT('%', ?, '%'))");
    $search->bind_param("ss", $search_term, $search_term);
    $search->bind_result($isbn, $name, $author, $picture, $price, $detail);
    $search->execute();
    $search->store_result();
?>
<div id="content">
    <!-- <div id="content_left">
    </div> end of content left -->

    <div id="content_right">
        <?php
        for ($book = 1; $book <= $search->num_rows; $book++) {
            $search->fetch();
        ?>
        <div class="product_box">
            <h1><?php echo $name; ?> <span>(by <?php echo $author; ?>)</span></h1>
            <img src="<?php echo $picture ?>" alt="book picture" height="125px" width="100px"/>
            <div class="product_info">
                <p><?php echo substr($detail, 0, 50); ?>...<a href="/details.php?isbn=<?php echo $isbn; ?>">More</a></p>
                <div class="buy_now_button" id="<?php echo $isbn; ?>"><a href="/cart.php?book=<?php echo $isbn; ?>">Add to cart - Rs <?php echo $price; ?></a></div>
                <div class="detail_button"><a href="/details.php?isbn=<?php echo $isbn; ?>">Detail</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
        </div>
        <?php
        if (($book % 2) == 1)
            echo "<div class=\"cleaner_with_width\">&nbsp;</div>";
        else
            echo "<div class=\"cleaner_with_height\">&nbsp;</div>";
        }
        ?>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
<?php
    // Close the prepared statment buffer
    $search->close();
    require_once "templates/footer.html.php";
?>
