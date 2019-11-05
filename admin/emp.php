<?php

$eid=$_POST['eid'];
$connect=mysqli_connect("localhost","root","","authentication") or mysqli_error();
echo "Connection successful";
echo "<br>";
if($eid=="*")
{
    $result=mysqli_query($connect, "select * from customer");
}
else
{
    $result=mysqli_query($connect, "select * from customer where (id='$eid')");
}

?>




<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="/admin/assets/image.css">
<link rel="stylesheet" href="/assets/css/emp.css">
	<h1>Welcome To ABC BookStore Admin Panel</h1>
	<hr size="5" color="red"></hr>
</head>
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
  <div class="loginbox">
    <table>
            <th><P>ID</P></th>
            <th><p>Name</P></th>
            <th><P>Dob</P></th>
            <th><P>Date of Join</P></th>
			<th><P>Phone</P></th>
			<th><P>Email</P></th>
			<th><P>Address</P></th>
			<th><P>Pin</P></th>
            
<?php
while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    
    
    echo "<td>"."<p>".$row['id']."</P>"."</td>";
    echo "<td>"."<p>".$row['name']."</P>"."</td>";
    echo "<td>"."<p>".$row['dob']."</P>"."</td>";
    echo "<td>"."<p>".$row['joined']."</P>"."</td>";
	echo "<td>"."<p>".$row['phone']."</P>"."</td>";
	echo "<td>"."<p>".$row['email']."</P>"."</td>";
	echo "<td>"."<p>".$row['address']."</P>"."</td>";
	echo "<td>"."<p>".$row['pin']."</P>"."</td>";
    
    echo "</tr>";
    
}

?>

</table>
&nbsp &nbsp &nbsp<a href="update.html">Update Table</a>
&nbsp &nbsp &nbsp<a href="insert.html">Insert Table</a>
&nbsp &nbsp &nbsp<a href="delete.html">Delete Table</a>
</div>
</body>
</html>