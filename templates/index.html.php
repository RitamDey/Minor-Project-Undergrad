<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="/assets/css/common_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="container">
	<div id="menu">
    	<ul>
            <li><a href="/" class="current">Home</a></li>
            <li><a href="subpage.html">Search</a></li>
            <li><a href="subpage.html">Books</a></li>            
            <li><a href="/index.php?sort=new-releases">New Releases</a></li>  
            <li><a href="/about.php">About Us</a></li> 
            <li><a href="/contact.php">Contact Us</a></li>
    	</ul>
    </div> <!-- end of menu -->
    
    <div id="header">
        <div id="new_books">
        	<ul>
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->
    
    <div id="content">
    	
        <div id="content_left">
        	<div class="content_left_section">
            	<h1>Categories</h1>
                <ul>
                    <li><a href="subpage.html">Donec accumsan urna</a></li>
                    <li><a href="subpage.html">Proin vulputate justo</a></li>
                    <li><a href="#">In sed risus ac feli</a></li>
                    <li><a href="#">Aliquam tristique dolor</a></li>
                    <li><a href="#">Maece nas metus</a></li>
                    <li><a href="#">Sed pellentesque placerat</a></li>
                    <li><a href="#">Suspen disse</a></li>
                    <li><a href="#">Maece nas metus</a></li>
                    <li><a href="#">In sed risus ac feli</a></li>
            	</ul>
            </div>
			<div class="content_left_section">
            	<h1>Bestsellers</h1>
                <ul>
                    <li><a href="#">Vestibulum ullamcorper</a></li>
                    <li><a href="#">Maece nas metus</a></li>
                    <li><a href="#">In sed risus ac feli</a></li>
                    <li><a href="#">Praesent mattis varius</a></li>
                    <li><a href="#">Maece nas metus</a></li>
                    <li><a href="#">In sed risus ac feli</a></li>
                    <li><a href="http://www.flashmo.com" target="_parent">Flash Templates</a></li>
                    <li><a href="http://www.templatemo.com" target="_parent">CSS Templates</a></li>
                    <li><a href="http://www.webdesignmo.com" target="_parent">Web Design</a></li>
                    <li><a href="http://www.photovaco.com" target="_parent">Free Photos</a></li>
            	</ul>
            </div>
            
            <div class="content_left_section">
                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>
			</div>
        </div> <!-- end of content left -->

        <div id="content_right">
        <?php
        $count = 1;
        while ($book = $books->fetch_assoc()) {
        ?>
            <div class="product_box">
                <h1><?php echo $book["name"]; ?> <span>(by <?php echo $book["author"]; ?>)</span></h1>
                <img src="<?php echo $book["picture"] ?>" alt="book picture" height="100px" width="100px"/>
                <div class="product_info">
                    <p>Aliquam a dui, ac magna quis est eleifend dictum.</p>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now - Rs <?php echo $book["price"]; ?></a></div>
                    <div class="detail_button"><a href="/details.php?isbn=<?php echo $book["isbn"]; ?>">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            <?php
            if (($count % 2) == 1)
                echo "<div class=\"cleaner_with_width\">&nbsp;</div>";
            else
                echo "<div class=\"cleaner_with_height\">&nbsp;</div>"
            ?>
    <?php
        $count++;
    }
    ?>
     <div class="cleaner_with_height">&nbsp;</div>
     </div> <!-- end of content -->
    
    <div id="footer">
    
	       <a href="/index.php">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="/index.php?sort=new-releases">New Releases</a> | <a href="/about.php">FAQs</a> | <a href="/contact.php">Contact Us</a><br />
        Copyright © 2019 <a href="#"><strong>Project Bookstore</strong></a>
    </div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>
