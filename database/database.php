<?php

function get_connection() {
	$servername = "localhost";
	$username = "bookstore";
	$password = "bookstore";

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;
}


function get_books($connection) {
	/**
	 * Wrapper around the select statment to fetch all the books present in the database. Expects a single parameter:
	 * $connection := Connection to the database
	 * Returns the result of the query if one or more rows are found,
	 * Else returns -1, to signify no result
	 */
	$query = "SELECT name,publisher,author FROM bookstore.book;";

	$result = $connection->query($query);

	if ($result->num_rows == 0) {
		return -1;
	}

	return $result;
}


function get_by($connection, $attrib) {
	/**
	 * Wrapper around the SQL "GROUP BY" statment. Expects two parameters:
	 * $connection := Connection to the database
	 * $attrib := The field on which the "GROUP BY" should be performed.
	 * This function returns the result of the query only if one or more rows have been returned by the database
	 * Else it returns -1, to signify no result.
	 */
	$query = "SELECT name, isbn FROM bookstore.book GROUP BY " . $attrib;

	$result = $connection->query($query);

	if ($result->num_rows === 0) {
		return -1;
	}

	return $rows;
}


function destroy_connection($connection) {
	// Destroys a database connection
	if ($connection) {
		mysqli_close($connection);
	}
}
?>
