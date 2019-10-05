<?php
    // require_once "../templates/header.html.php";
    require_once "../lib/sanitizers_validators.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        // If the user is requesting to signup, then display the signup page
        require_once "html/signup.html.php";
    } else {
        // Else the user has passed the info. Process and record the data in the database
        $email = sanitizeEmail($_POST["email"]);
        $password = sanitizePassword($_POST["password"]);


    }


    // require_once "../templates/footer.html.php";
?>
