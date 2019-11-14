<?php
    require_once "lib/sanitizers_validators.php";
    $TITLE = "Purchase preview -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->query("SET global global_log = 1;");
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

    if (isset($_GET["book"])) {
        // Add the following book to the cart and redirect to the referring page
        $book_query = "SELECT quantity FROM shopcart_items WHERE cart=\"{$cart_id}\" AND book=\"{$_GET["book"]}\"";
        $cart_book = $connection->query($book_query);

        if ($cart_book->num_rows > 0) {
            $add_result = $connection->query("UPDATE shopcart_items SET quantity = quantity + 1 WHERE book = \"{$_GET["book"]}\"");

            if ($add_result === false && $add_result->errno) {
                echo $add_result->error;
                die();
            }
        } else {
            $add_book = $connection->query("INSERT INTO shopcart_items (cart,book) VALUES ({$cart_id},{$_GET["book"]})");

            if ($add_book === false && $add_book->errno) {
                echo $add_book->error;
                die();
            }
        }

        // Now redirect back to the referring page
        header("Location: {$_SERVER["HTTP_REFERER"]}", true, 302);
    } else if (isset($_GET["remove"])) {
        // Remove a book from the cart or decrease its quantity by 1
        $book_quantity = $connection->query("SELECT quantity FROM shopcart_items WHERE cart=\"{$cart_id}\" AND book=\"{$_GET["remove"]}\"");

        if ($book_quantity === false || $book_quantity->num_rows === 0) {
            // Now redirect back to the referring page
            header("Location: {$_SERVER["HTTP_REFERER"]}", true, 302);
            die();
        }

        $quantity = (int)$book_quantity->fetch_assoc()["quantity"];

        if ($quantity > 1) {
            $result = $connection->query("UPDATE shopcart_items SET quantity = quantity - 1 WHERE book = \"{$_GET["remove"]}\"");
        } else {
            $result = $connection->query("DELETE FROM shopcart_items WHERE book = \"{$_GET["remove"]}\"");
        }
        
        header("Location: {$_SERVER["HTTP_REFERER"]}", true, 302);
        die();
    }

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
        echo "<td><button><a href=\"/cart.php?book={$isbn}\">Add one more</a></button></td>";
        echo "<td><button><a href=\"/cart.php?remove={$isbn}\">Remove one</a></button></td>";
        echo "</tr>";
    }
?>
</table>
<button><a href="/buy.php">Buy Now!</a></button>
<?php
    $book_query->close();
    require_once "templates/footer.html.php";
?>
