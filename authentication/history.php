<?php
    require_once "lib/sanitizers_validators.php";
    $sess = $_COOKIE["PHPSESSID"];

    $connection = new mysqli("localhost", "bookstore", "bookstore");

    /**
     * Prevent browser from caching this page.
     * no-store: Says the browser not to cache the response at all
    **/
    header("Cache-Control: no-store");
    
    // Check if a active session is avaliable for the user
    $query = "SELECT user FROM authentication.user_sessions WHERE session = '{$sess}'";
    $user_id = $connection->query($query);

    if (!checkActiveSession($sess)) {
        header("Location: /authentication/login.php", true, 302);
    }

    $user_id = $user_id->fetch_assoc()["user"];

    $user_query = "SELECT name,dob,picture FROM authentication.customer WHERE id = {$user_id}";
    $user = $connection->query($user_query)->fetch_assoc();

    $bill_query = "SELECT id,time FROM sales.bill WHERE billed_to = {$user_id}";
    $bills = $connection->query($bill_query);
    
    $TITLE = "{$user["name"]} -- Bookstore Inc";
    require_once "templates/header.html.php";
?>
<div class="profile">
    <div class="picture">
        <img src="<?php echo $user["picture"]; ?>" width="200" height="200" >
        
    </div>

    <div class="name">
        <h3> <?php echo $user["name"]; ?> </h3>
    </div>
</div>

<div class="purchase">
<?php
    while ($bill = $bills->fetch_assoc()) {
        $bill_id = $bill["id"];
        $bill_time = $bill["time"];

        $books_billed_query = "SELECT book,quantity FROM sales.books_bill WHERE bill_id = {$bill_id}";
        $books_billed = $connection->query($books_billed_query);
        echo "<h3 class=\"purchase_id\">Bill Number {$bill_id} </h3>";
        echo "<table>";
        echo "<tr>";
        echo "<th> Book </th>";
        echo "<th> Cost </th>";
        echo "<th> Quantity </th>";
        echo "</tr>";
        $total = 0;
        while ($book = $books_billed->fetch_assoc()) {
            $name_price_query = "SELECT name,price FROM bookstore.book WHERE isbn = {$book["book"]}";
            $name_price = $connection->query($name_price_query)->fetch_assoc();

            echo "<tr>";
            echo "<td> {$name_price["name"]} </td>";
            echo "<td> {$name_price["price"]} </td>";
            echo "<td> {$book["quantity"]} </td>";
            echo "</tr>";

            $total += ((double)$name_price["price"] * (double)$book["quantity"]);
        }
        echo "<tr><td></td><td>Total Amount</td><td>{$total}</td></tr>";
        echo "</table>";
    }

    require_once "templates/footer.html.php";
?>
