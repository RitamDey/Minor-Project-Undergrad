<?php
function santizeName($name) {
    // TODO: Write santizer code to santize the supplied to rid of any SQL injections
    return $name;
}


function getAllAuthors($connection) {
    /**
     * Gets the records of all the authors present in the database
     * @var $connection mysqli := Connection to the database
     * Return @var $result mysqli_result := Result of the query
     */
    $query = "SELECT name,picture FROM bookstore.author;";

    $result = $connection->query($query);

    if ($result->num_rows === 0) {
        return -1;
    }

    return $result;
}

function getAuthorDetail($connection, $name) {
    /**
     * Get the details of a particular author present in the database
     * @var $connection mysqli := Connection to the database;
     * @var $name string := Name of the author to fetch
     */
    $name = santizeName($name);
    $query = "SELECT name,bio,site,picture,dob FROM bookstore.author WHERE name = '{$name}';";

    $result = $connection->query($query);

    if (($result->num_rows === 0) || ($result->num_rows > 1))
        return -1;

    return $result;
}

function getAuthorBooks($connection, $name) {
    /**
     * Get all the books published by the author
     * @var $connection mysqli := Connection to the database
     * @var $name string := Name of the author to fetch the books
     */
    $name = santizeName($name);
    $query = "SELECT isbn,name,picture FROM bookstore.book WHERE author = '{$name}' ORDER BY date_published;";

    $result = $connection->query($query);

    return $result;
}