<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up -- Bookstore Inc</title>
<link href="/assets/css/signup1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
	<div id="menu">
    	<ul>
            <li><a href="/">Home</a></li>
            <li><a href="subpage.html">Search</a></li>
            <li><a href="subpage.html">Books</a></li>            
            <li><a href="/index.php?sort=new-releases">New Releases</a></li>  
            <li><a href="/about.php">About Us</a></li> 
            <li><a href="/contact.php">Contact Us</a></li>
            <li><a href="/contact.php">Login</a></li>
            <li><a href="#" class="current">Signup</a></li>
    	</ul>
    </div> <!-- end of menu -->
    
    <div id="header">
        
    </div> <!-- end of header -->
    
    <div id="content">
    	
        <div id="content_left">
        </div> <!-- end of content left -->

        
        <div class="signup">
            <h1 align="center">Signup Here</h1><br>
            <form name="signup" method="POST" action="<?php echo $_SERVER["PHP_SELF"] // PHP_SELF refers to the current page?>">
               <label for="email">Email</p>
                <input type="email" name="email" id="email" placeholder="Enter your email address" required><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required onfocusout="validate_password()"><br>
                <label for="cpassword">Confirm password</p>
                <input type="password" id="cpassword" placeholder="Confirm your password" required onfocusout="check_passwords()"><br>
               
               <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="submit"> <br>
               <br>
               <br>Already have an account&nbsp;<a href="/authentication/login.php">Login</a>

           </form>
        </div>
        </div> <!-- end of content -->
   
    <div id="footer">
    
	       <a href="/index.php">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="/index.php?sort=new-releases">New Releases</a> | <a href="/about.php">FAQs</a> | <a href="/contact.php">Contact Us</a><br />
        Copyright © 2019 <a href="#"><strong>Project Bookstore</strong></a>
    </div>
</div> <!-- end of container -->
<script>
    function validate_password() {
        /**
         * This function validates that password created confirms to the standards we set
        **/
    }

    function check_passwords() {
        /**
         * This function checks that the passwords created are infact the same
        **/
       let created_password = document.getElementById("password");
       let confirm_password = document.getElementById("cpassword");

       console.log(created_password);
       console.log(confirm_password);

       if (confirm_password.length) {
       }
    }
</script>

</body>
</html>
