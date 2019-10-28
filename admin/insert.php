<?php

$eid=$_POST['eid'];
$ename=$_POST['emp_name'];
$salary=$_POST['salary'];
$doj=$_POST['doj'];
$dept=$_POST['dept'];

$connect=mysqli_connect("localhost","root","","saptarshi") or mysqli_error();
echo "Connection successful";
echo "<br>";

$insert="insert into amp (emp_id,emp_name,salary,doj,dept) values ($eid,'$ename','$salary','$doj','$dept')";
$result=mysqli_query($connect, $insert);
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
  <?php
  if($result==NULL)
  {   echo "<br>";
      echo "<p>"."Record Insertion Faliure!!!!";
  }
  else
  {   echo "<br>";
      echo"<p>".("Record Successfully Inserted");
  }
  ?>
	
	
</body>
</html>
