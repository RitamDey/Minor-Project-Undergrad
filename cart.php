<?php
    $TITLE = "Order Summary -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("bookstore");

    $books = explode(",", $_COOKIE["cart"]);
    $query = "SELECT name,price FROM book WHERE isbn=";
    foreach($books as $book) {
        if (!$book)
            continue;
        $book = $connection->query($query . $book);
        if (!$book)
            continue;

        $book = $book->fetch_assoc();

?>

<table>
    <tr>
        <th> Book Name </th>
        <th> Price </th>
        <th> Quantity </th>
    </tr>
<?php
    echo "<tr>";
    echo "<td>{$book["name"]}</td>";
    echo "<td>{$book["price"]}</td>";
    echo "</tr>";
?>
</table>
<button><a href="/buy.php">Buy Now</a></button>
<?php
    }
    
    require_once "templates/footer.html.php";
?>
