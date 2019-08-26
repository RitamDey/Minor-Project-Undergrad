<html>
<head>
    <title> Online Bookstore Managment </title>
</head>

<body>
<?php
    include "database/database.php";
    
    echo "Placeholder for the project code";

    $connection = get_connection();

    $books = get_books($connection);

    if ($books === -1) {
	    echo "0 books found";
    } else {
	    while ($row = $books->fetch_assoc()) {
		    echo "Book " . $row["name"] . " Published By " . $row["publisher"] . "<br/>";
	    }
    }

    destroy_connection($connection);
?>
</body>
</html>
