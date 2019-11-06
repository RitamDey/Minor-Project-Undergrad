<html>
<head>
    <title> User SQL generator tool </title>
</head>

<body>
<?php
    if (isset($_SERVER) && $_SERVER["REQUEST_METHOD"] === "GET") {
?>
    <center> Create a user </center>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <table>
        <tr>
            <td><label for="email">Email ID:</label></td>
            <td><input id="email" name="email" type="email" required></td>
        </tr>
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input id="password" name="password" type="password" required></td>
            <td><button id="show-button">Show Password</button></td>
        </tr>
        <tr>
            <td><label for="name">Name: </label></td>
            <td><input id="name" name="name" type="text"></td>
        </tr>
        <tr>
            <td><label for="address">Address: </label></td>
            <td><input id="address" name="address" type="text"></td>
        </tr>
        <tr>
            <td><label for="dob">Date of Birth: </label></td>
            <td><input id="dob" name="dob" type="date"></td>
        </tr>
        <tr>
            <td><label for="pin">PIN Code: </label></td>
            <td><input id="pin" name="pin" type="number" max="999999"></td>
        </tr>
        <tr>
            <td><label for="picture">Picture: </label></td>
            <td><input id="picture" name="picture" type="url"></td>
             <td><p><b>Please use a URL to the picture</b></p></td>
        </tr>
        <tr>
            <td><label for="phone">Phone Number: </label></td>
            <td><input id="phone" name="phone" type="tel" pattern="\+91[0-9]{10}"></td>
           <td><p><b>Please include the country prefix</b></p></td>
        </tr>
    </table>
    <input type="hidden" value="1">
    <input type="submit" value="Submit">
    </form>
    
<?php
    } else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        var_dump($_POST);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT, ["cost" => 11]);
        $query_const = "INSERT INTO customer (id, name, dob, joined, phone, email, address, pin, password, picture) VALUES (NULL";
        
        $query_const .= "," . ($_POST["name"]?"\"{$_POST["name"]}\"":"NULL");
        $query_const .= "," . ($_POST["dob"]?"\"{$_POST["dob"]}\"":"NULL");
        $query_const .= ",CURRENT_TIMESTAMP";
        $query_const .= "," . ($_POST["phone"]?"\"{$_POST["phone"]}\"":"NULL");
        $query_const .= "," . "\"{$_POST["email"]}\"";
        $query_const .= "," . ($_POST["address"]?"\"{$_POST["address"]}\"":"NULL"); 
        $query_const .= "," . ($_POST["pin"]?"\"{$_POST["pin"]}\"":"NULL"); 
        $query_const .= "," . "\"{$password}\""; 
        $query_const .= "," . ($_POST["picture"]?"\"{$_POST["picture"]}\"":"NULL"); 
        $query_const .= ");";

        echo $query_const;

        // Write out the generated SQL to the script file
        $open_file = fopen("./user_data.sql", "a+");
        fwrite($open_file, $query_const);
        fwrite($open_file, "\n");
        fflush($open_file);
        fclose($open_file);

        header("Location: {$_SERVER["PHP_SELF"]}", true, 302);
    }
?>
<script>
document.getElementById("show-button").addEventListener("click", function(event) {
    let element = document.getElementById('password');
    event.preventDefault();

    console.log(element.type);

    if (element.type === "password") {
	    element.type = "text";
	    document.getElementById("show-button").innerText = "Hide Password";
    } else {
	    element.type = "password";
	    document.getElementById("show-button").innerText = "Show Password";
    }
});
</script>
</body>
</html>
