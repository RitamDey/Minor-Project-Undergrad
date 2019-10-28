<?php

$eid=$_POST['eid'];
$connect=mysqli_connect("localhost","root","","saptarshi") or mysqli_error();
echo "Connection successful";
echo "<br>";
if($eid=="*")
{
    $result=mysqli_query($connect, "select * from amp");
}
else
{
    $result=mysqli_query($connect, "select * from amp where (emp_id='$eid')");
}

?>




<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="../image.css">
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
            <th><P>Employee ID</P></th>
            <th><p>Employee Name</P></th>
            <th><P>Salary</P></th>
            <th><P>Date of Join</P></th>
            <th><P>Depertment</P></th>
            
<?php
while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    
    
    echo "<td>"."<p>".$row['emp_id']."</P>"."</td>";
    echo "<td>"."<p>".$row['emp_name']."</P>"."</td>";
    echo "<td>"."<p>".$row['salary']."</P>"."</td>";
    echo "<td>"."<p>".$row['doj']."</P>"."</td>";
    echo "<td>"."<p>".$row['dept']."</P>"."</td>";
    
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