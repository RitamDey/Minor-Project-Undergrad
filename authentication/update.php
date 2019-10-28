<?php
    require_once "lib/sanitizers_validators.php";
    $sess = $_COOKIE["PHPSESSID"];

    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");
    $session_query = "SELECT user FROM user_sessions WHERE session = '{$sess}'";

    $user_id = $connection->query($session_query)->fetch_assoc();

    // If no active session is found, redirect to /authentication/login.php
    if (!checkActiveSession($sess)) {
        header("Location: /authentication/login.php", true, 302);
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        // If the user requested the settings page, then display the form
        require "authentication/html/update.html.php";
        die();
    } else {
        // Else process the submitted data
        //var_dump($_POST);
        //echo "<br/>";

        if ($_POST["update-type"] === "password-update") {
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
                header("Location: /authentication/update.php", true, 302);
            }
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT, ["cost" => 11]);
            $password_update = "UPDATE customer SET password = \"{$password_hash}\" WHERE id = {$user_id["user"]}";
            $connection->query($password_update);

            header("Location: /authentication/logout.php", true, 302);
        } elseif ($_POST["update-type"] === "details-update") {
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
                $dob_query = "UPDATE customer SET dob = {$_POST["dob"]} WHERE customer.id = {$user_id["user"]}";
                
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

            header("Location: /authentication/profile.php", true, 302);
        }
    }
?>
