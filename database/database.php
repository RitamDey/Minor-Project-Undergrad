<?php

function getConnection() {
	/**
	 * Creates and returns a new connection to the MySQL database
	 */
	$servername = "localhost";
	$username = "bookstore";
	$password = "bookstore";

	$conn = mysqli_connect($servername, $username, $password);

	if ($conn->get_connection_stats() == false)
		die("Connection failed: " . $conn->connect_error);

	return $conn;
}


function getBooks($connection) {
	/**
	 * Wrapper around the select statement to fetch all the books present in the database. Expects a single parameter:
	 * @var $connection mysqli := Represents a connection to the MySQL database
	 * Returns the result of the query if one or more rows are found,
	 * Else returns -1, to signify no result
	 */
	$query = "SELECT isbn,name,publisher,author,picture FROM bookstore.book;";

	$result = $connection->query($query);

	if ($result->num_rows == 0) {
		return -1;
	}

	return $result;
}


function getBy($connection, $attrib) {
	/**
	 * Wrapper around the SQL "GROUP BY" statement. Expects two parameters:
	 * @var $connection mysqli := Connection to the database
	 * @var $attrib string := The field on which the "GROUP BY" should be performed.
	 * This function returns the result of the query only if one or more rows have been returned by the database
	 * Else it returns -1, to signify no result.
	 */
	$query = "SELECT name, isbn FROM bookstore.book GROUP BY " . $attrib;

	$result = $connection->query($query);

	if ($result->num_rows === 0) {
		return -1;
	}

	return $result;
}


function destroyConnection($connection) {
	/**
	 * Destroys a database connection
	 * @var $connection mysqli := Connection to the MySQL database
	 */
	if ($connection) {
		$connection->close();
	}

	$connection = null;
}
?>
