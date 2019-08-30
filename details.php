<?php

include "lib/book_details.php";
include "database/database.php";

$connection = getConnection();
$bookDeatils = getDetails($connection, $_GET["isbn"]);

if ($bookDeatils == -1)
    // Display a book not found page
    require "html/book_not_found.html";
?>
<html>
    <head>
        <title> Book Store </title>
    </head>
    
    <body>
        <aside>
            <div>
                <div id="book-picture">
                    <?php
                        if ($bookDeatils["picture"])
                            echo "<img src=\"" . $bookDeatils["picture"] . "\">";
                        else
                            // TODO: Find a default image for books that have no image
                            echo "<img src=\"\">";
                    ?>
                </div>

                <div id="book-name">
                    <?php
                    echo $bookDeatils["name"];
                    ?>
                </div>

                <div id="book-tags">
                    <?php
                    foreach (getTags($connection, $_GET["isbn"]) as $tag) {
                        echo "<small><a href=\"". $tag["tag"] ."\"";
                    }
                    ?>
                </div>

                <div id="book-price">
                    <?php
                    echo $bookDeatils["price"];
                    ?>
                </div>
            </div>
        </aside>

        <div id="book-details">
            <?php
                echo $bookDeatils["details"];
            ?>
        </div>
    </body>
</html>