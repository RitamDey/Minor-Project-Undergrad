<?php require_once "templates/header.html.php"; ?>   
<div id="content">
<link href="/assets/css/signup1.css" rel="stylesheet" type="text/css" />
    <div class="signup">
        <h1 align="center">Quick Signup</h1><br>
        <form name="signup" method="POST" action="<?php echo $_SERVER["PHP_SELF"] // PHP_SELF refers to the current page ?>">
            <label for="email">Email</p>
            <input type="email" name="email" id="email" placeholder="Enter your email address" required><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required onfocusout="validate_password()"><br>
            <label for="cpassword">Confirm password</p>
            <input type="password" id="cpassword" placeholder="Confirm your password" required onfocusout="check_passwords()"><br>
           
           <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="submit"> <br>
           <br>
       </form>
       <br>Already have an account&nbsp;<a href="/authentication/login.php">Login</a>
    </div>
    </div> <!-- end of content -->
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

       if (confirm_password.length) {

       }
    }
</script>
<?php require_once "templates/footer.html.php"; ?>
