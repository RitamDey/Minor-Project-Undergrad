<?php
    require_once "lib/sanitizers_validators.php";

    if (isset($_COOKIE["PHPSESSID"]) && checkActiveSession($_COOKIE["PHPSESSID"])) {
        header("Location: /authentication/profile.php", true, 302);
        exit(0);
    }


    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once "authentication/html/login.html.php";

    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Login and redirection logic
        $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");

        // Get the email and password from the POST data
        $email = sanitizeEmail($_POST["email"]);
        $password = sanitizePassword($_POST["password"]);

        // Try and get the user's password and id from the database
        $query = "SELECT id,password FROM customer WHERE email = '{$email}'";
        $user = $connection->query($query);

        if ($user !== false && $user->num_rows < 1) {
            // Redirect to /authentication/login.php if the data provided is not true.
            header("Location: /authentication/login.php", true, 302);
        }

        $user = $user->fetch_assoc();
        
        if (!password_verify($password, $user["password"])) {
             // Redirect to /authentication/login.php if the password provided is not correct.
            header("Location: /authentication/login.php", true, 302);
        }

        // Start the session and create a session id
        session_start();

        $sess_id = session_id();  # Get the created session id

        // Insert the newly created session into the database to persist
        $query = "INSERT INTO user_sessions (session,user,started) VALUES ('{$sess_id}',{$user["id"]},CURRENT_TIMESTAMP)";
        $connection->query($query);

        // Redirect to the /authentication/profile.php after the process is done
        header("Location: /authentication/profile.php", true, 302);
    }
?>
