<?php

$isbn=$_POST['isbn'];

$connect=mysqli_connect("localhost","root","","bookstore") or mysqli_error();
echo "Connection successful";
echo "<br>";

$delete="delete from book where isb=$isbn";
$result=mysqli_query($connect, $delete);
echo "<br>";



?>

<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="../image.css">
<link rel="stylesheet" href="../assets/css/admin.css">
	<h1>Welcome To ABC BookStore Admin Panel</h1>
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
				<li><a href="employee.html">Customer Details</a></li>
				<li><a href="transaction.php">Transaction Details</a></li>
				<li><a href="product.html">Add Book & Other</a>
					<ul>
						<li><a href="addbook.php">Add Book</a></li>
						<li><a href="addauthor.php">Add Author</a></li>
						<li><a href="addpublisher.php">Add Publisher</a></li>
						
				</ul></li>
				
				<li><a href="contact.html"></a></li>
			</ul>
			
		</div>
    <br>
  <?php
  if($result==NULL)
  {   echo "<br>";
      echo "<p>"."Record Deletion Faliure!!!!";
  }
  else
  {   echo "<br>";
      echo"<p>".("Record Successfully Deleted");
  }
  ?>
	
	
</body>
}
else
{
?>
<center><a href="adminlogin.html"><font color=WHITE size=30>Please Login</font></a></center>
<?
}
?>
</html>
