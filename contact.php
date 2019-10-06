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

<div class="contact">
    <form name="contact" method="POST" action="/contact.php">
    <h1>Contact Us</h1>
    <p>Enter Your Name</p>
    <input type="text" name="name" placeholder="Enter Your Name" required>
    <p>Enter your Email</p>
    <input type="text" name="email" placeholder="Enter Your Email" required>
    <P>Massage Body</P>
    <textarea wrap="soft" cols="30" rows="10" placeholder="Enter Your Message" name="massage" required></textarea><br>

    <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="submit" value="Submit" name="submit"><br>
    <p>Help line-1800 000 123</p>
    <p>Email Us: info@abc.com</p>
    </form>
</div>

<link rel="stylesheet" href="/assets/css/contact.css">

<?php
require_once "templates/footer.html.php";
?>