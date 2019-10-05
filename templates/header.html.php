<?php
require_once "lib/sanitizers_validators.php";

$connection = new mysqli("localhost", "bookstore", "bookstore");

if ($connection->get_connection_stats() === false) {
    die($connection->connect_error);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $TITLE; ?></title>
    <link href="/assets/css/common_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container">
    <div id="menu">
        <ul>
            <li><a href="/" class="current">Home</a></li>
            <li><a href="subpage.html">Search</a></li>
            <li><a href="subpage.html">Books</a></li>
            <li><a href="/index.php?sort=new-releases">New Releases</a></li>
            <li><a href="/about.php">About Us</a></li>
            <li><a href="/contact.php">Contact Us</a></li>
<?php
if (checkActiveSession($_COOKIE["PHPSESSID"])) {
    echo "<li><a href=\"/cart.php\">View Cart</a></li>";
    echo "<li><a href=\"/authentication/profile.php\">Profile</a></li>";
} else {
    echo "<li><a href=\"/authentication/signup.php\">Sign Up</a></li>";
    echo "<li><a href=\"/authentication/login.php\">Log In</a></li>";
}
?>
        </ul>
    </div> <!-- end of menu -->

    <div id="header">
    </div>
