<?php
require_once "lib/sanitizers_validators.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // WIP: Need to debug why mail is not being sent
    echo mail($email, "Thanks for contacting {$name}", "Thank You {$name}, We will get to you shortly");
    echo "Done";
    
    die();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us -- Bookstore Inc</title>
<link href="/assets/css/contact.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
	<div id="menu">
    	<ul>
            <li><a href="/" >Home</a></li>
            <li><a href="../templates/subpage.html">Search</a></li>
            <li><a href="#">Books</a></li>            
            <li><a href="/index.php?sort=new-releases">New Releases</a></li>  
            <li><a href="/about.php">About Us</a></li> 
            <li><a href="/contact.php">Contact Us</a></li>
<?php
if (isset($_COOKIE["PHPSESSID"]) && checkActiveSession($_COOKIE["PHPSESSID"])) {
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
        
    </div> <!-- end of header -->
    
    <div id="content">
    	
        <div id="content_left">
       </div> <!-- end of content left -->

        
        <div class="contact">
            <form name="contact" method="POST" action="/contact.php">
            <h1>Contact Us</h1><br>
            <p>Enter Your Name</p><br>
            <input type="text" name="name" placeholder="Enter Your Name" required><br><br>
            <p>Enter your Email</p><br>
            <input type="text" name="email" placeholder="Enter Your Email" required><br><br>
            <P>Massage Body</P><br>
            <textarea wrap="soft" cols="30" rows="10" placeholder="Enter Your Message" name="massage" required></textarea><br><br>
    
           <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" name="submit"><br><br>
           <p>Help line-1800 000 123</p><br>
           <p>Email Us: info@bookstore.inc</p>
            </form>
        </div>
        </div> <!-- end of content -->
   
    <div id="footer">
    
	       <a href="/index.php">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="/index.php?sort=new-releases">New Releases</a> | <a href="/about.php">FAQs</a> | <a href="/contact.php">Contact Us</a><br />
        Copyright © 2019 <a href="#"><strong>Project Bookstore</strong></a>
    </div> 
</div>
</body>
</html>
