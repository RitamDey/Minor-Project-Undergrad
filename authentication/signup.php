<?php
    require_once "lib/sanitizers_validators.php";

    if (isset($_COOKIE["PHPSESSID"]) && checkActiveSession($_COOKIE["PHPSESSID"])) {
        header("Location: /authentication/history.php", true, 302);
        die();
    }
    // require_once "../templates/header.html.php";
    $connection = new mysqli("localhost", "bookstore", "bookstore");
    
    $connection->select_db("authentication"); 

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $TITLE = "Sign Up -- Bookstore Inc";
        // If the user is requesting to signup, then display the signup page
        require_once "authentication/html/signup.html.php";
    } else {
        // Else the user has passed the info. Process and record the data in the database
        $email = sanitizeEmail($_POST["email"]);
        $password = sanitizePassword($_POST["password"]);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT, ["cost" => 11]);

        // Prepare the query and add the user to the database
        $query = "INSERT INTO customer (id, name, dob, joined, phone, email, address, pin, password, picture) VALUES (NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, '{$email}', NULL, NULL, '{$hashed_password}', NULL)";
        $connection->query($query);

        // The user has been enterted. Now start his/her session and register it
        session_start();
        
        $new_user_id = "SELECT id FROM customer WHERE email = '{$email}'";
        $new_user_id = $connection->query($new_user_id)->fetch_assoc()["id"];
        $session = session_id();
        
        $session_store = "INSERT INTO user_sessions (session,user,started) VALUES ('{$session}',{$new_user_id},CURRENT_TIMESTAMP)";
        $connection->query($session_store);

        // The registration is complete. Redirect to /authentication/profile.php
        header("Location: /authentication/profile.php", true, 302);
    }


    // require_once "../templates/footer.html.php";
?>
