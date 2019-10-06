<?php
require_once "templates/header.html.php";
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="../assets/css/contact.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="container">
	<div id="menu">
    	<ul>
            <li><a href="/" >Home</a></li>
            <li><a href="../templates/subpage.html">Search</a></li>
            <li><a href="subpage.html">Books</a></li>            
            <li><a href="/index.php?sort=new-releases">New Releases</a></li>  
            <li><a href="/about.php">About Us</a></li> 
            <li><a href="/contact.php">Contact Us</a></li>
            <li><a href="../html/login1.html" class="current">Login</a></li>
            <li><a href="../html/signup1.html">Signup</a></li>
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
    
           <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="submit" value="Submit" name="submit"><br><br>
           <p>Help line-1800 000 123</p><br>
           <p>Email Us: info@abc.com</p>
            </form>
        </div>
        </div> <!-- end of content -->
   
    <div id="footer">
    
	       <a href="/index.php">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="/index.php?sort=new-releases">New Releases</a> | <a href="/about.php">FAQs</a> | <a href="/contact.php">Contact Us</a><br />
        Copyright © 2019 <a href="#"><strong>Project Bookstore</strong></a>
    </div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>


<?php
require_once "templates/footer.html.php";
?>