<?php
    $TITLE = "Thank You -- Bookstore Inc";
    require_once "templates/header.html.php";
    $connection->select_db("sales");

    if (!isset($_COOKIE) || !checkActiveSession($_COOKIE["PHPSESSID"])) {
        header("Location: /authentication/login.php", true, 302);
    }
    
    $session = $_COOKIE["PHPSESSID"];
    $user_id = $connection->query("SELECT user FROM authentication.user_sessions WHERE session=\"{$session}\"");

    if ($user_id->num_rows === 1) {
        $user_id = $user_id->fetch_assoc()["user"];
    }

    $create_bill = $connection->query("INSERT INTO bill (billed_to) VALUES (\"{$user_id}\")");

    if ($create_bill === false && $create_bill->errno) {
        echo $create_bill->error;
        die();
    }

    $last_bill_query = "SELECT MAX(id) AS last_bill FROM bill WHERE billed_to=\"{$user_id}\"";
    $result = $connection->query($last_bill_query);

    if ($result && $result->num_rows < 1)
        die();

    $last_bill = $result->fetch_assoc()["last_bill"];
    
    $cart_query = $connection->query("SELECT cart_id FROM shopcart WHERE user=\"{$user_id}\"");
    
    if ($connection->errno) {
        echo $cart_query->error;
        die();
    }

    $cart = $cart_query->fetch_assoc()["cart_id"];
    $cart_items = $connection->query("SELECT book,quantity FROM shopcart_items WHERE cart=$cart");

    if ($cart_items === false || $connection->errno) {
        echo $cart_items->error;
        die();
    }
    
    $isbn = null;
    $quantity = null;
    $bill_id = $last_bill;
    $add_bill = $connection->prepare("INSERT INTO books_bill (bill_id,book,quantity) VALUES (?,?,?)");
    $add_bill->bind_param("iii", $bill_id, $isbn, $quantity);
    
    while ($book_record = $cart_items->fetch_assoc()) {
        $isbn = $book_record["book"];
        $quantity = $book_record["quantity"];
        $add_bill->execute();

        if( $add_bill->errno) {
            echo $add_bill->error;
            $add_bill->close();
            die();
        }
    }
    $add_bill->close();

    $remove_cart = $connection->query("DELETE FROM shopcart WHERE cart_id = {$cart}");

    if ($remove_cart === false || $connection->errno) {
        echo $connection->error;
        die();
    }
?>

<div id="content_right">
   <img src="/assets/images/order.png" width="960">
   <h1>Your Order No - <?php echo $last_bill; ?><br><br>
   <button><a href="/authentication/history.php"><b>View Purchase History</b></a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button><a href="/"><b>Return to bookstore</b></a></button>
</div>

<?php
    require_once "templates/footer.html.php";
?>
