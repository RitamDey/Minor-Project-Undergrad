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
</body>
</html>
