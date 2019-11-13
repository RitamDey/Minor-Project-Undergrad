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


    <div id="content_right">
       
       <img src="order.png" width="960">
       <?php
       echo "<h1>"."your order no - 18007809909"."<br>";
       echo "<br>";
       echo "<b>"."<button type=button onclick= href = 'index.php'>Return To Profile </button>";
       echo "&nbsp &nbsp &nbsp &nbsp"; 
       echo "<b>"."<button type=button onclick= href = 'index.php'>Return Shopping </button>";
       #echo "<br>". "<a href=www.google.com>Go to your account</a>";
       ?>
      
    </div>
<?php
    require_once "templates/footer.html.php";
?>
