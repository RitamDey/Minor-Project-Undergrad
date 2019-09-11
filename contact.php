<?php
if (isset($_POST["name"]) && $_POST["email"]) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // WIP: Need to debug why mail is not being sent
    echo mail($email, "Thanks for contacting {$name}", "Thank You {$name}, We will get to you shortly");
    echo "Done";
} else {
    require_once "html/contact.html";
}