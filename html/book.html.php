<html>
<title>
	Book store management
</title>
<head>
<link rel="stylesheet" href="/assets/css/image.css">
	<h1>Welcome To ABC BookStore</h1>
	<hr size="5" color="red"/>
</head>
<body>
	<div class="hyperlink">
        <a href="signup.html">SignUp</a>
        &nbsp &nbsp &nbsp &nbsp<a href="sign.html">SignIn</a> &nbsp &nbsp
	</div>
	<div class="menu">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/about.php">About Us</a></li>
				<li><a href="product.html">Books</a>
					<ul>
						<li><a href="storybook.html">Story Book</a></li>
						<li><a href="sducational.html">Educational Book</a></li>
						<li><a href="competetive">Competative Exam Book</a></li>
						<li><a href="novel.html">Novel</a></li>
				</ul></li>
				<li><a href="/contact.php">contact Us</a></li>
			</ul>
    </div>
	<br>
	
	<p>New Arrival</p><br>
	
	<marquee scrollamount="15">
		<table cellspacing="20px" cellpadding="20px" margin="0px">
            <tr>
            <?php
                while ($row = $books->fetch_assoc()) {
                    echo "<td><a href='/details.php?isbn={$row["isbn"]}'><img src='{$row["picture"]}' heigth='300px'></a></td>";
                }
            ?>
            </tr>
		</table>
	</marquee>		
</body>
</html>