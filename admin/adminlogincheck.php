<html>
<title>Login_check</title>
<style>
.alert {
    padding: 20px;
    background-color: GREEN;
    color: white;
	float: none !important;
	width: auto !important;
}
.alert1 {
    padding: 20px;
    background-color: RED;
    color: white;
	float: none !important;
	width: auto !important;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
footer
{
padding: 1em;
color:white;
background-color:black;
clear:left;
text-align:center;
}
</style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saptarshi";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);

if($_SESSION)
{
	$a_id=$_SESSION["a_id"];
	$pwd=$_SESSION["apwd"];
}
else
{
$a_id=$_POST["id"];

$pwd=$_POST["pwd"];
}

$sql = "SELECT * FROM admin where A_ID='".$a_id."' and PWD='".$pwd."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
	$_SESSION["a_id"]=$row["A_ID"];
	$_SESSION["apwd"]=$row["PWD"];
    }
?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Admin Login successful</strong>
</div>

<center>
<img src="load.gif">
<?php 
header( "refresh:2;url=book.php" );
}
else
{
	?>
	<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Login Unsuccessful</strong>
</div>

<?php
include "adminlogin.html";
}
$conn->close();
?>


