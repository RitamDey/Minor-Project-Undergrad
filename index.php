<html>
<head>
    <title> Online Bookstore Management </title>
</head>

<body>
<?php
    // Prevent showing mysql errors
    //error_reporting(0);
    require "database/database.php";
    $connection = getConnection();
    $books = getBooks($connection);

    if ($books === -1) {
	    echo "0 books found";
    } else {
?>
<div>
<?php
       while ($row = $books->fetch_assoc()) {
            echo "<div id='book-{$row["isbn"]}'>
                    <a href='/details.php?isbn={$row['isbn']}'><img src='{$row['picture']}' alt=''>{$row['name']}</a>
                  </div>";
        }
	}
?>
</div>
<?php
    destroyConnection($connection);
?>
</body>
</html>
