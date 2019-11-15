<?php
    $TITLE = "Details -- Bookstore Inc";
    require_once "templates/header.html.php";
    require_once "lib/sanitizers_validators.php";
    $connection->select_db("bookstore");

    $isbn = validateISBN($_GET["isbn"]);
    $details_query = "SELECT isbn,name,detail,date_published,price,book_number,series,publisher,author,picture,total_pages FROM bookstore.book WHERE isbn = " . $isbn;

    $bookDetails = $connection->query($details_query);

    if ($bookDetails === false || $bookDetails->num_rows < 1)
        // Display a book not found page
        require "html/book_not_found.html";

    $book = $bookDetails->fetch_assoc();

    $tags_query = "SELECT tag FROM is_tagged WHERE isbn = '{$isbn}'";
    $tags = $connection->query($tags_query);

    // TODO: Implement the validations of picture
?>
<div id="content">
        <div id="content_left">
        	<div class="content_left_section">
            	<h1>Tags</h1>
                <ul>
                    <?php
                        while ($tag = $tags->fetch_assoc()) {
                            echo "<li><a href=\"/tag.php?tag={$tag["tag"]}\">{$tag["tag"]}</a></li>";
                        }
                    ?>
            	</ul>
            </div>
        </div> <!-- end of content left -->
        
        <div id="content_right">
        	
            <h1><?php echo $book["name"]; ?></h1>
            <div class="image_panel"><img src="<?php echo $book["picture"]; ?>" alt="Cover" width="100" height="150" /></div>
            <?php
                if ($book["series"])
                    echo "<h2>Book {$book["book_number"]} of <a href=\"/series.php?series={$book["series"]}\">{$book["series"]}</a></h2>";
            ?>
            <ul>
                <li>By <a href="/author.php?name=<?php echo $book["author"]; ?>"><?php echo $book["author"]; ?></a></li>
                <li>Published By: <?php echo $book["publisher"]; ?></li> 
                <li>Published: <?php
                    echo (new DateTime($book["date_published"]))->format("d F Y")
                ?></li>
                <li>Pages: <?php echo $book["total_pages"]; ?></li>
                <li>ISBN: <?php echo $book["isbn"]; ?></li>
                <li>Price: Rs. <?php echo $book["price"]; ?>&Tab;</li>
            </ul>
            <br/>
            <div class="buy_now_button" id="<?php echo $book["isbn"]; ?>"><a href="/cart.php?book=<?php echo $book["isbn"]; ?>">Add to cart</a></div>
            
            <?php echo htmlspecialchars($book["detail"], ENT_COMPAT | ENT_HTML401 | ENT_QUOTES | ENT_IGNORE); ?>
            
             <div class="cleaner_with_height">&nbsp;</div>
            
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->

    <script src="/assests/js"></script>
<?php
    require_once "templates/footer.html.php";
?>
