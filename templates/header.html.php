<?php
session_start();
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
    <meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
    <meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
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
        </ul>
    </div> <!-- end of menu -->

    <div id="header">
        <div id="new_books">
            <ul>
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
    </div>
