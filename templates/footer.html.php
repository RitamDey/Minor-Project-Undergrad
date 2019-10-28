<?php
    if (isset($connection) && $connection !== null) {
        $connection->close();
    }
?>
    <div id="footer">

        <a href="/index.php">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="/index.php?new-releases">New Releases</a> | <a href="/about.php">FAQs</a> | <a href="/contact.php">Contact Us</a><br />
        Copyright © 2019 <a href="/"><strong>Bookstore Inc</strong></a>
    </div>
    <!-- end of footer -->
    </div> <!-- end of container -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
    <script src="https://kit.fontawesome.com/795f6b8766.js" crossorigin="anonymous"></script>
    <script>
    for (let button of document.getElementsByClassName('buy_now_button')) {
        button.addEventListener("click", function(event) {
            // Prevent the default action of the <a> tag.
            event.preventDefault();

            // The button's id is the book's ISBN get this on a variable
            let isbn = this.id;

            let cart = Cookies.get("cart");
            console.log(isbn);
            
            if (cart)
                cart += isbn + ",";
            else
                cart = isbn + ",";
            console.log(cart);
             
            Cookies.set("cart", cart, { path: '/' });
        });
    }
    </script>
</body>
</html>
