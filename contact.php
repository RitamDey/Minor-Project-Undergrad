<?php
    $TITLE = "Contact Us -- Bookstore Inc";
    require_once "lib/sanitizers_validators.php";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        // WIP: Need to debug why mail is not being sent
        echo mail($email, "Thanks for contacting {$name}", "Thank You {$name}, We will get to you shortly");
        echo "Done";
        
        die();
    }

    require_once "templates/header.html.php";
?>   
<div id="content">
    <link href="/assets/css/contact.css" rel="stylesheet" type="text/css" />
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
<?php require_once "templates/footer.html.php"; ?>
