<?php
    $TITLE = "About Us -- Bookstore Inc";
    require_once "templates/header.html.php";
    require_once "lib/sanitizers_validators.php";
    $sess = $_COOKIE["PHPSESSID"];

    /**
     * Prevent browser from caching this page.
     * no-store: Says the browser not to cache the response at all
    **/
    header("Cache-Control: no-store");

    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");
    $session_query = "SELECT user FROM user_sessions WHERE session = '{$sess}'";

    $user_id = $connection->query($session_query)->fetch_assoc();

    // If no active session is found, redirect to /authentication/login.php
    if (!checkActiveSession($sess)) {
        header("Location: /authentication/login.php", true, 302);
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
?>
<link rel="stylesheet" href="/assets/css/signup1.css">

<div class="signup">
   <h1 align="center">Update Profile</h1><br>
    <form name="Signup" method="POST" action="/authentication/update.php">
        <P>Name<P>
        <input type="text" name="name" placeholder="Enter Your Name"><br><br>
        <p>Date Of Birth</P>
        <input type="text" name="dob" placeholder="yyyy/mm/dd"><br><br>
        <p>Phone</P>
        <input type="number" name="phone" placeholder="enter your mobile number"><br><br>
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Your Email"><br><br>
        <p>Address</p><br>
        <textarea wrap="soft" rows="10" cols="40" name="address" placeholder="Enter your address"></textarea><br><br>
        <p>Pin</p>
        <input type="number" name="pincode" placeholder="Enter Your Area Pincode"><br><br>
        <p>Picture</p><br>
        <input type="text" name="picture"><br><br>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Update">
    </form>  
</div>


  


<link rel="stylesheet" href="/assets/css/image.css">
<?php
        die();
    } else {
            // Handles the updates to other user details.
            if ($_POST["name"]) {
                $name_query = "UPDATE customer SET name = \"" . sanitizeName($_POST["name"]) . "\" WHERE customer.id = {$user_id["user"]}";

                $connection->query($name_query);
            }

            if ($_POST["phone"]) {
                $phone_query = "UPDATE customer SET phone = {$_POST["phone"]} WHERE customer.id = {$user_id["user"]}";
                
                $connection->query($phone_query);
            }

            if ($_POST["dob"]) {
                $dob_query = "UPDATE customer SET dob = \"{$_POST["dob"]}\" WHERE customer.id = {$user_id["user"]}";
                
                $connection->query($dob_query);
            }

            if ($_POST["email"]) {
                // Santize the email for possible bad input
                $email = sanitizeEmail($_POST["email"]);
                $email_query = "UPDATE customer SET email = \"{$email}\" WHERE customer.id = {$user_id["user"]}";
                
                $connection->query($email_query);
            }

            if ($_POST["address"]) {
                $address_query = "UPDATE customer SET address = \"{$_POST["address"]}\" WHERE customer.id = {$user_id["user"]}";
                
                $connection->query($address_query);
            }

            if ($_POST["pincode"]) {
                $pincode_query = "UPDATE customer SET pincode = \"{$_POST["pincode"]}\" WHERE customer.id = {$user_id["user"]}";
                
                $connection->query($pincode_query);
            }

            if ($_POST["picture"]) {
                $picture = validatePicture($_POST["picture"]);
                $picture_query = "UPDATE customer SET picture = \"{$picture}\" WHERE customer.id = {$user_id["user"]}";

                $connection->query($picture_query);
            }

            header("Location: /authentication/history.php", true, 302);
        }

    require_once "templates/footer.html.php";
?>
