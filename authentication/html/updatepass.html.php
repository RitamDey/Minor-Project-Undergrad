<link rel="stylesheet" href="/assets/css/signup1.css">

<?php
$TITLE = "About Us -- Bookstore Inc";
require_once "templates/header.html.php";
?>

<div class="signup">
   <h1 align="center">Update Profile</h1><br>
    <form name="Signup" method="POST" action="register.html" onsubmit="val()">
        <P>Current Password<P>
        <input type="password" name="currentpass" placeholder="Enter Your Current Password" required><br><br>
        <p>New Password</P>
        <input type="password" name="newpass" placeholder="Enter Your New Password" required><br><br>
        <p>Confirm Password</P>
        <input type="password" name="confirmpass" placeholder="Enter Your Confirm Password"><br><br>
        
        <br><br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="submit" name="submit" value="Update">
    </form>  
</div>


  


<link rel="stylesheet" href="/assets/css/image.css">
<?php
require_once "templates/footer.html.php";
?>
