<?php
function validateParameter($isbn) {
    // Simple validation wrapper to validate that the given ISBN and check if it's a proper ISBN or not
    return filter_var($isbn, FILTER_VALIDATE_INT);
}

/**
 * Function to return the entire details of a book given the ISBN
 * @param $connection mysqli := Represents the connection to the database
 * @param $isbn int := Represents the ISBN of the book that needs to be fetched.
 * 
 * @return
 */
function getDetails($connection, $isbn) {
    if (validateParameter($isbn) == false) {
        return -1;
    }
    $query = "SELECT isbn,name,price,book_number,series,publisher,author,picture,detail FROM bookstore.book WHERE isbn = " . $isbn;

    $result = $connection->query($query);

    // If the query returned anything more or less than one record, then tell the view to display a book not found page
    if (($result->num_rows < 1) && ($result->num_rows > 1)) {
        return -1;
    }

    // Since the result is only one row, get that row from the result of the query
    $result = $result->fetch_assoc();

    // Check if the picture url of the book is a valid image url or not
    if (validatePicture($result["picture"]) == false) {
        $result["picture"] = null;
    }

    return $result;
}


function validatePicture($url) {
    // TODO: Check if the fetched resource is a image or not
    return filter_var($url, FILTER_VALIDATE_URL);
}


function getTags($connection, $isbn) {
    /**
     * Returns all the tags a book is tagged into
     * @var $connection mysqli := MySQL database connection
     * @var $isbn int := ISBN representing the book
     */
    $query = "SELECT tag FROM bookstore.is_tagged WHERE isbn = '{$isbn}';";

    return $connection->query($query);
}
