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

        $email = sanitizeEmail($_POST["email"]);
        $password = sanitizePassword($_POST["password"]);
        $query = "SELECT id,password FROM customer WHERE email = '{$email}'";

        $user = $connection->query($query);

        if ($user !== false && $user->num_rows < 1) {
            header("Location: /authentication/login.php", true, 302);
        }

        $user = $user->fetch_assoc();
        
        if (!password_verify($password, $user["password"])) {
            header("Location: /authentication/login.php", true, 302);
        }

        session_start();

        $sess_id = session_id();
        $query = "INSERT INTO user_sessions (session,user,started) VALUES ('{$sess_id}',{$user["id"]},CURRENT_TIMESTAMP)";

        $connection->query($query);

        header("Location: /authentication/profile.php", true, 302);
    }
?>