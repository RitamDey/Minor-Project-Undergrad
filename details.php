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
                            echo "<img src='{$bookDeatils["picture"]}' alt=''>";
                        else
                            // TODO: Find a default image for books that have no image
                            echo "<img src=\"\" alt=''>";
                    ?>
                </div>

                <div id="book-name">
                    <?php
                    echo $bookDeatils["name"];
                    ?>
                </div>

                <?php
                if ($bookDeatils["series"] != null) {
                    echo "<div class='book-series'>";
                    echo "<a class='series' href='series.php?series={$bookDeatils["series"]}'>";
                    echo "{$bookDeatils["series"]}</a> Book {$bookDeatils["book_number"]}";
                    echo "</div>";
                }
                ?>

                <div id="book-tags">
                    <?php
                    $tags = getTags($connection, $_GET["isbn"]);
                    foreach ($tags as $tag) {
                        echo "<a href='tag.php?tag={$tag["tag"]}'>{$tag["tag"]}</a>&nbsp;";
                    }
                    ?>
                </div>

                <div id="book-price">
                    <?php
                    echo "Price: {$bookDeatils["price"]}";
                    ?>
                </div>
            </div>
        </aside>

        <div id="book-details">
            <?php
                echo $bookDeatils["detail"];
            ?>
        </div>
        <div class="book-author">
            Written by<?php
                echo "<a href='/author.php?name={$bookDeatils["author"]}'>{$bookDeatils["author"]}</a>";
            ?>
        </div>
    </body>
</html>
