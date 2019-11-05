<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="/admin/assets/image.css">
<link rel="stylesheet" href="/admin/assets/admin.css">
	<h1>Welcome To BookStore Inc Admin Panel</h1>
	<hr size="5" color="red"></hr>
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
	?>
	<body>
	<div class="hyperlink">

        
        
        &nbsp &nbsp &nbsp &nbsp<a href="signout.php">Sign Out</a> &nbsp &nbsp
		
		
	</div>
	<div class="menu">
			<ul>
				<li><a href="employee.html">Employee Details</a></li>
				<li><a href="transaction.php">Transaction Details</a></li>
				<li><a href="product.html">Status of Stock</a>
					<ul>
						<li><a href="storybook.html">Story Book</a></li>
						<li><a href="sducational.html">Educational Book</a></li>
						<li><a href="competetive">Competative Exam Book</a></li>
						<li><a href="novel.html">Novel</a></li>
				</ul></li>
				
				<li><a href="contact.html"></a></li>
			</ul>
			
		</div>
	<br>
	
	
</body>
	<?
}
else
{
?>
<center><a href="adminlogin.html"><font color=WHITE size=30>Please Login</font></a></center>
<?
}
?>
</html>