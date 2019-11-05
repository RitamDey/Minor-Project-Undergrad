<?php
    require_once "lib/sanitizers_validators.php";
    $TITLE = "Purchase preview -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("authentication");

    if (checkActiveSession($_COOKIE["PHPSESSID"]) === false) {
        header("Location: /authentication/login.php", true, 302);
        die();
    }

    /**
     * Prevent browser from caching this page.
     * no-store: Says the browser not to cache the response at all
    **/
    header("Cache-Control: no-store");

    $session = $_COOKIE["PHPSESSID"];
    $user_id = null;

    // Using prepared statments as a basic against SQL Injection
    $user_query = $connection->prepare("SELECT user FROM user_sessions WHERE session=?");
    $user_query->bind_param("s", $session);
    $user_query->bind_result($user_id);
    $user_query->execute();
    $user_query->fetch();
    $user_query->close();

    $connection->select_db("sales");
    
    /**
     * It is always guaranteed that the cart's ID will be equals to that of user's ID.
     * But we need to make sure that the cart actually exists in the database.
     * To make sure, run a query. If the returned rows are less than 1, create the cart
    **/
    $cart_exists = "SELECT cart_id FROM shopcart WHERE user={$user_id}";

    if ($connection->query($cart_exists)->num_rows < 1) {
        // No user cart exists. Create one.
        $connection->query("INSERT INTO shopcart (user, cart_id) VALUES ({$user_id}, {$user_id})");
    }
    $cart_id = $user_id;

    // Get the books in the cart.
    $cart_books = "SELECT book,quantity FROM shopcart_items WHERE cart={$cart_id}";
    $result = $connection->query($cart_books);
    $isbn = null;
    $book_name = null;
    $price = null;
    $book_query = $connection->prepare("SELECT name,price FROM bookstore.book WHERE isbn=?");
    $book_query->bind_param("s", $isbn);
    $book_query->bind_result($book_name, $price);
?>
<table>
    <tr>
        <th> Book </th>
        <th> Quantity </th>
        <th> Price </th>
    </tr>
<?php
    while ($item = $result->fetch_assoc()) {
        $isbn = $item["book"];
        $quantity = $item["quantity"];
        $book_query->execute();
        $book_query->fetch();

        echo "<tr>";
        echo "<td>{$book_name}</td>";
        echo "<td>{$quantity}</td>";
        echo "<td>{$price}</td>";
        echo "</tr>";
    }
?>
</table>
<?php
    $book_query->close();
    require_once "templates/footer.html.php";
?>
