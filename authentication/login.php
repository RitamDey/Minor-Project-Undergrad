<?php
    require_once "../lib/santizers_validators.php";

    if (checkActiveSession($_COOKIE["PHPSESSID"])) {
        header("Location: /authentication/profile.php", true, 302);
        exit(0);
    }

    
    if ($_SERVER["REQUEST_METHOD"] === "GET")
        require_once "html/login.html";
    elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Login and redirection logic
    }
?>