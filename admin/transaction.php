<?php
$connect=mysqli_connect("localhost","root","","sales") or mysqli_error();

echo "<br>";

	$result=mysqli_query($connect, "select * from bill");
?>
<title>
	Transcation History
</title>
<head>

<style>
        #report1 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
	
	opacity:.75;
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
<link rel="stylesheet" href="/admin/assets/image.css">
<link rel="stylesheet" href="/assets/css/emp.css">
	<h1>Transacion Hisory&nbsp</h1>
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

        
        
        
    &nbsp &nbsp &nbsp &nbsp<a href="signout.php">Sign Out</a>
		
		
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
	if (!isset($_GET['id'])) {
?>
  <div class="loginbox">
	  <font color=WHITE>
    <table id="report1">
            <th> Bill ID</P></th>
            <th> Billed To</P></th>
            <th> Billed Date</P></th>
           
            
<?php
	while($row=mysqli_fetch_assoc($result)) {   
			echo "<tr>";
			
			$user_name = "SELECT name FROM authentication.customer WHERE id={$row['billed_to']}";
			$user = $connect->query($user_name)->fetch_assoc();

			echo "<td>"."<a href='/admin/transaction.php?id={$row['id']}'>".$row['id']."</p></a>"."</td>";
			echo "<td>"." ".$user['name']."</P>"."</td>";
			echo "<td>"." ".$row['time']."</P>"."</td>";
			
			
			echo "</tr>";
		}
	} else {
		$bill_query = "SELECT * FROM sales.books_bill WHERE bill_id={$_GET["id"]}";
		$result = $connect->query($bill_query);
		
		if ($connect->errno) {
			echo "DATABASE ERROR: " . $connect->error;
			die();
		} else {
			$isbn = null;
			$name = null;
			$price = null;

			$statment = $connect->prepare("SELECT name,price FROM bookstore.book WHERE isbn=?");
			$statment->bind_param("s", $isbn);
			$statment->bind_result($name, $price);
			

?>
	<div class="loginbox">
		<table id="report1">
			<th><p>ISBN</p></th>
			<th><p>Book Name</p></th>
			<th><p>Quantity</p></th>
			<th><p>Price</p></th>
<?
			while ($item = $result->fetch_assoc()) {
				echo "<tr>";

				$isbn = $item["book"];
				$statment->execute();
				$statment->fetch();
				echo "<td><p>{$item["book"]}</p></td>";
				echo "<td><p>{$name}</p></td>";
				echo "<td><p>{$item["quantity"]}</p></td>";
				echo "<td><p>{$price}</p></td>";

				echo "</tr>";
			}
		}
	}
?>

</table>
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