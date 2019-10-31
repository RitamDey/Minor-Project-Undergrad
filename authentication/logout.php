<?php
    require_once "lib/sanitizers_validators.php";
    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");

    if (!checkActiveSession($_COOKIE["PHPSESSID"])) {
        // redirect to index.php
        header("Location: /", true, 302);
    }

    // Since the PHPSESSID comes directly from the user's control, it's better treat it as a gateway to possible SQL Injection attacks
    // So we are using mysqli prepared statments that provides a rudimentary protection against SQL attacks by escaping the giving data using the format specifier passed to it during `bind_param` call
    $query = $connection->prepare("DELETE FROM user_sessions WHERE session=?");
    $session = $_COOKIE["PHPSESSID"];
    $query->bind_param("s", $session);  // Use the string format specifer
    $query->execute();

    session_destroy();

    $query->close();
    header("Location: /", true, 302);
