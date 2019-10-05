<?php
    $TITLE = "Log In -- Bookstore Inc";
    require_once "templates/header.html.php";
?>
    <link href="/assets/css/login1.css" rel="stylesheet" type="text/css"/>
    <div id="content">
        <div id="content_left">
        </div> <!-- end of content left -->
        <div class="loginbox">
            <h1 align="center">Bookstore Login</h1>
            <form name="login" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter Your email" required><br><br>
                <p>Password</p><input type="password" name="password" placeholder="Enter Your Password" required><br>
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Login"> <br>
            </form>
            <br><a href="forgetpsw.html">Forgot Password</a><br>
            <br>Dont have an account&nbsp;<a href="/authentication/signup.php">Create one!</a>
        </div>
    </div> <!-- end of content -->
<?php
        require_once "templates/footer.html.php";
?>