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
    <form name="Signup" method="POST" action="/authentication/change-password.php">
        <P>Current Password<P>
        <input type="password" name="current-password" placeholder="Enter Your Current Password" required><br><br>
        <p>New Password</P>
        <input type="password" name="new-password" placeholder="Enter Your New Password" required><br><br>
        <p>Confirm Password</P>
        <input type="password" name="confirm-password" placeholder="Enter Your Confirm Password"><br><br>
        
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Update">
    </form>  
</div>
<link rel="stylesheet" href="/assets/css/image.css">
<?php
        die();
    } else {
        // Handles the updates to user's password
        $current_password = $_POST["current-password"];
        $new_password = $_POST["new-password"];

        $password_query = "SELECT password FROM customer WHERE id = {$user_id["user"]}";
        $password = $connection->query($password_query);

        if ($password === false || $password->num_rows < 1)
            die();

        $old_password = $password->fetch_assoc()["password"];

        if (password_verify($current_password, $old_password) === false) {
            // Wrong password is given, redirect to /authentication/update.php
            header("Location: /authentication/change-password.php", true, 302);
        }
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT, ["cost" => 11]);
        $password_update = "UPDATE customer SET password = \"{$password_hash}\" WHERE id = {$user_id["user"]}";
        $connection->query($password_update);

        header("Location: /authentication/logout.php", true, 302);
    }
    require_once "templates/footer.html.php";
?>
