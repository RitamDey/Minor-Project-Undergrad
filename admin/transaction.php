<?php
$connect=mysqli_connect("localhost","root","","saptarshi") or mysqli_error();

echo "<br>";

    $result=mysqli_query($connect, "select * from books_bill");

?>
<title>
	Trnsaction History
</title>
<head>
<link rel="stylesheet" href="../image.css">
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
            <th><P>Bill ID</P></th>
            <th><p>Book ID</P></th>
            <th><P>Quantity</P></th>
           
            
<?php
while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    
    
    echo "<td>"."<p>".$row['bill_id']."</P>"."</td>";
    echo "<td>"."<p>".$row['book']."</P>"."</td>";
    echo "<td>"."<p>".$row['quantity']."</P>"."</td>";
    
    
    echo "</tr>";
    
}

?>

</table>
</div>
</body>
</html> 