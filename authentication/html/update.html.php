<html>
    <head>
        <title>
            Signup page
        </title>
        <link rel="stylesheet" href="update.css" type="text/css">
     </head>
     <body>
        <div class"change-password">
            <h1 align="center">Update Password</h1>
            <form name="password-update" method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
            <label for="current-password">Enter your Current Password</label>
            <input type="password" id="current-password" name="current-password" placeholder="Current password">
            <label for="new-password">Create a new password</label>
            <input type="password" id="new-password" name="new-password" placeholder="Create a password">
            <label for="confirm-password">Confirm the new password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm the password">
            <input type="hidden" name="update-type" value="password-update">
            <input type="submit" value="Change Password">
            </form>
        </div>
         <div class="signup">
             <h1 align="center">Change Profile Details</h1>
             <form name="Signup" method="POST" action="">
                <p>Name</p>
                <input type="text" name="name" placeholder="Enter your name" ><br>
                <p>DOB</p>
                <input type="date" name="dob" placeholder="Enter your date of birth" ><br>
                <p>Phone number</p>
                <input type="text" name="phone" placeholder="Enter your phone number" ><br>
                <p>Address</p>
                <textarea wrap="soft" rows="10" cols="40" name="address" placeholder="Enter your address" ></textarea>
                <p>Email</p>
                <input type="text" name="email" placeholder="Enter your email" >
                <p>Pin</p>
                <input type="number" name="pincode" placeholder="Enter your area pincode" >
                <p>Picture</p>
                <input type="file" name="Pic" placeholder="Drop Your Picture Here" ><br>
                 <input type="hidden" name="update-type" value="details-update">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="submit"> <br>

            </form>
         </div>
     </body>
</html>
