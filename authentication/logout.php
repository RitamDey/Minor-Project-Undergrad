<?php
    require_once "lib/sanitizers_validators.php";
    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");

    if (!checkActiveSession($_COOKIE["PHPSESSID"])) {
        // redirect to index.php
        header("Location: /", true, 302);
    }

    $query = "DELETE FROM user_sessions WHERE session = '{$_COOKIE["PHPSESSID"]}'";
    $connection->query($query);

    session_destroy();

    header("Location: /", true, 302);