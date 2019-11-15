<link rel="stylesheet" href="/assets/css/signup1.css">

<?php
$TITLE = "About Us -- Bookstore Inc";
require_once "templates/header.html.php";
?>

<div class="signup">
   <h1 align="center">Update Profile</h1><br>
    <form name="Signup" method="POST" action="register.html" onsubmit="val()">
        <P>Name<P>
        <input type="text" name="name" placeholder="Enter Your Name" required><br><br>
        <p>Date Of Birth</P>
        <input type="text" name="dob" placeholder="yyyy/mm/dd" required><br><br>
        <p>Phone</P>
        <input type="number" name="phone" placeholder="enter your mobile number"><br><br>
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Your Email"><br><br>
        <p>Address</p><br>
        <textarea wrap="soft" rows="10" cols="40" name="address" placeholder="Enter your address" required></textarea><br><br>
        <p>Pin</p>
        <input type="number" name="pin" placeholder="Enter Your Area Pincode"><br><br>
        <p>Picture</p><br>
        <input type="file" name="pic"><br><br>
        <p> Current Password</p>
        <input type="password" name="pin" placeholder="Enter Your Password" required><br><br>
        <p>New Password</p>
        <input type="password" name="pin" placeholder="Enter Your New Password"><br><br>
        <br><br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="submit" name="submit" value="Update">
    </form>  
</div>


  


<link rel="stylesheet" href="/assets/css/image.css">
<?php
require_once "templates/footer.html.php";
?>
