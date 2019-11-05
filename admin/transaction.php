<?php
$connect=mysqli_connect("localhost","root","","sales") or mysqli_error();

echo "<br>";

	$result=mysqli_query($connect, "select * from bill");
?>
<title>
	Transcation History
</title>
<head>
<link rel="stylesheet" href="/admin/assets/image.css">
<link rel="stylesheet" href="/assets/css/emp.css">
	<h1>Transacion Hisory&nbsp</h1>
	<hr size="5" color="red"></hr>
</head>
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
						<li><a href="storybook.html">Add Book</a></li>
						<li><a href="sducational.html">Add Author</a></li>
						<li><a href="competetive">Add Publisher</a></li>
						
				</ul></li>
				
				<li><a href="contact.html"></a></li>
			</ul>
			
		</div>
	<br>
<?php
	if (!isset($_GET['id'])) {
?>
  <div class="loginbox">
    <table>
            <th><P>Bill ID</P></th>
            <th><p>Billed To</P></th>
            <th><P>Billed Date</P></th>
           
            
<?php
	while($row=mysqli_fetch_assoc($result)) {   
			echo "<tr>";
			
			$user_name = "SELECT name FROM authentication.customer WHERE id={$row['billed_to']}";
			$user = $connect->query($user_name)->fetch_assoc();

			echo "<td>"."<a href='/admin/transaction.php?id={$row['id']}'><p>".$row['id']."</p></a>"."</td>";
			echo "<td>"."<p>".$user['name']."</P>"."</td>";
			echo "<td>"."<p>".$row['time']."</P>"."</td>";
			
			
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
		<table>
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
</html> 