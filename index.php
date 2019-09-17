<?php
    // Prevent showing mysql errors
    //error_reporting(0);
    require "database/database.php";
    $connection = getConnection();
    $books = getBooks($connection);

    if ($books === -1) {
	    echo "0 books found";
    } else {
//        require_once "html/book.html.php";
        require_once "templates/index.html.php";
    }
destroyConnection($connection);
?>