<?php

$eid=$_POST['eid'];
$ename=$_POST['emp_name'];
$salary=$_POST['salary'];
$doj=$_POST['doj'];
$dept=$_POST['dept'];
$connect=mysqli_connect("localhost","root","","saptarshi") or mysqli_error();
echo "Connection successful";
echo "<br>";

$update="update amp set emp_name='$ename',salary='$salary',doj='$doj',dept='$dept' where (emp_id='$eid')";
$result=mysqli_query($connect, $update);
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

        
        
        &nbsp &nbsp &nbsp &nbsp<a href="sign.html">SignIn</a> &nbsp &nbsp
		
		
	</div>
	<div class="menu">
			<ul>
				<li><a href="employee.html">Employee Details</a></li>
				<li><a href="about.html">Transaction Details</a></li>
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
      echo "<p>"."Record Updation faliure!!!!";
  }
  else
  {   echo "<br>";
      echo"<p>".("Record Successfully updated");
  }
  ?>
	
	
</body>
</html>
