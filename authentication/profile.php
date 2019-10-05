<?php
    if (session_status() == PHP_SESSION_NONE) {
        // redirect to /login.php

    }
    require_once "../lib/sanitizers_validators.php";

    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");

    if (isset($_GET["name"]) {
        // Display the profile of the said user
        $name = santizeName($_GET["name"]);

        require_once "display_profile.php";
    } else {
        // Check if a active session is avaliable for the user
        $query = "SELECT id FROM sessions WHERE sess_id = {$_SESSION}";
        $user_id = $connection->query($query);
        if ($user_id->num_rows 

        $user_query = "SELECT name,dob,picture FROM customer WHERE id = {$user_id}";
        $user = $connection->query($user_query)->fetch_assoc();

        $bill_query = "SELECT id,time FROM bill WHERE customer = {$user_id}";
        $bills = $connection->query($bill_query);
    }
?>
