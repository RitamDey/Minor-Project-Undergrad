<?php
    $TITLE = "Order Summary -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("bookstore");

    $books = explode(",", $_COOKIE["cart"]);
    $book = null;
    $name = null;
    $price = null;

    $query = $connection->prepare("SELECT name,price FROM book WHERE isbn=?");
    $query->bind_param("i", $book);
    $query->bind_result($name, $price);
 
    foreach($books as $book) {
        if (!$book)
            continue;

        $query->execute();
        $book = $query->fetch();;
?>

<table>
    <tr>
        <th> Book Name </th>
        <th> Price </th>
        <th> Quantity </th>
    </tr>
<?php
    echo "<tr>";
    echo "<td>{$name}</td>";
    echo "<td>{$price}</td>";
    echo "</tr>";
?>
</table>
<button><a href="/buy.php">Buy Now</a></button>
<?php
    }
    require_once "templates/footer.html.php";
?>
