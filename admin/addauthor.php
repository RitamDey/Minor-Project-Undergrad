<?php

$connect=mysqli_connect("localhost","root","","bookstore") or mysqli_error();
echo "Connection successful";
echo "<br>";

    $result=mysqli_query($connect, "select * from author");


?>




<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="/admin/assets/image.css">
<link rel="stylesheet" href="/assets/css/emp.css">

	<h1>Welcome To ABC BookStore Admin Panel</h1>
    <hr size="5" width="2700" color="red"></hr>
    



    <style>
        #report1 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
	
    background-color:white;
	opacity:1
	text-align: center;
    width: 100%;
}

#report1 td  #report1 tr{
    border: 1px solid #ddd;
	
	padding: 8px;
}


#report1 th {
    padding-top: 12px;
    border: 1px solid #ddd;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
        </style>

        


</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
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
  <font color="WHITE">
    <table id="report1">
            <th><P>Name</P></th>
            <th><p>Bio</P></th>
            <th><P>Site</P></th>
            <th><P>Picture</P></th>
			<th><P>Dob</P></th>
		
            
<?php
while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    
    
    echo "<td>"." ".$row['name']."</P>"."</td>";
    echo "<td>"." ".$row['bio']."</P>"."</td>";
    echo "<td>"." ".$row['site']."</P>"."</td>";
    echo "<td>"." ".$row['picture']."</P>"."</td>";
	echo "<td>"." ".$row['dob']."</P>"."</td>";
	
    
    echo "</tr>";
    
}

?>

</table>
</font>
&nbsp &nbsp &nbsp<p><a href="updateauthor.html">Update Table</a>
&nbsp &nbsp &nbsp<a href="insertauthor.html">Insert Table</a>
&nbsp &nbsp &nbsp<a href="deleteauthor.html">Delete Table</a>
</div>
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