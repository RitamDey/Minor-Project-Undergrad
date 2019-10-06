<?php
require_once "lib/sanitizers_validators.php";
$name = sanitizeName($_GET["name"]);
$TITLE = "{$name} -- Bookstore Inc";


require_once "templates/header.html.php";
$connection->select_db("bookstore");

$author_query = "SELECT name,bio,site,picture,dob FROM author WHERE name = '{$name}'";
$author = $connection->query($author_query);

if ($author === false || $author->num_rows < 1)
    die("FATAL SQL ERROR");

$author = $author->fetch_assoc();

$books_query = "SELECT isbn,name,picture,price,detail,author FROM book WHERE author = '{$name}' ORDER BY date_published";
$books = $connection->query($books_query);

if ($books === false || $books->num_rows < 1) {
    echo "<b> No books found </b>";
    die();
}
?>


<div id="content">
    <div id="content_left">
        <div class="image_panel"><img src="<?php echo $author["picture"]; ?>" alt="Author picture" width="100%" height="100%" /></div>
    </div> <!-- end of content left -->
    
    <div id="content_right">
        
        <h1><?php echo $author["name"]; ?></h1>
        
        <h2>Read the lessons - Watch the videos - Do the exercises</h2>
        <ul>
            <li>Site <a href="<?php echo $author["site"]; ?>"><?php echo $author["site"]; ?></a></li>
            <li>Born: <?php
            $dob = new DateTime($author["dob"]);

            echo $dob->format("d F Y");
            ?></li>
            <!-- <li>Pages: 498</li> -->
        </ul>

        <p><?php echo htmlspecialchars($author["bio"], ENT_COMPAT | ENT_HTML401 | ENT_QUOTES | ENT_IGNORE); ?></p>
        <div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content right -->

    <div class="cleaner_with_height">&nbsp;</div>
</div> <!-- end of content -->

<hr/>
<div class="cleaner_with_height"></div>

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