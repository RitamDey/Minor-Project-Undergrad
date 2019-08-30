<html>
<head>
    <title> Online Bookstore Management </title>
</head>

<body>
<?php
    require "database/database.php";
    
    echo "Placeholder for the project code <br/>";

    /** @var mysqli $connection */
    $connection = getConnection();

    /** @var mysqli_result $books */
    $books = getBooks($connection);

    if ($books === -1) {
	    echo "0 books found";
    } else {
?>
        <div>
<?php
       while ($row = $books->fetch_assoc()) {
            echo "<div id='book-". $row["isbn"]. "'>\n<a href='/details.php?isbn=" . $row['isbn']. "'><img src=''>\n". $row['name'] . "\n</a>\n</div>";
        }
	}
?>
        </div>
<?php
    destroyConnection($connection);
?>
</body>
</html>
