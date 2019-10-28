<?php
function sanitizeName(string $name): string {
    /**
     * Sanitizes the supplied tag from the $_GET get request variables
     * @var $name string := The name requested by the user.
     */
    return $name;
}

function validatePicture(string $url) {
    // TODO: Check if the fetched resource is a image or not
    return filter_var($url, FILTER_VALIDATE_URL);
}

function validateISBN(string $isbn): string {
    // TODO: Validation for the passed ISBN
    return $isbn;
}

function sanitizeEmail(string $email): string {
    /**
     * Sanitizes if the supplied string is a valid email or not
     * @var $email string := The email to validate
    **/

    return filter_var($email, FILTER_SANITIZE_EMAIL);
}

function sanitizePassword(string $password): string {
    /**
     * TODO
     * Check if the password is of valid length and doesn't contains illegals
     */
    return $password;
}

// The argument to the function is a session id, or can be null if there is no current PHPSESSID defined
function checkActiveSession(?string $session_id): bool {
    /**
    * Gets a session id and checks if the session is active for 5 days or less
    * If it's active for more than five days, then logout from the store
    **/
    if ($session_id === null)
        return false;
    
    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");
    // If a session is present, it would return the active time in hh:mm:ss 
    $query = "SELECT started  FROM user_sessions WHERE session = '{$session_id}'";
    $result = $connection->query($query);

    if ($result->num_rows < 1)
        return false;
    
    $result = $result->fetch_assoc();

    /**
     * Workaround for the DateInterval not being comparable.
     * Converts the session started time, fetched from database, to PHP DateTime, they are comparable
     * Get a DateTime object for the current time.
     * Create a new DateTime object that is 5 days ahead of the date when the session was started.
     * Now compare if the current date is less than five days interval, return true if so.
    **/
    $time_started = new DateTime($result["started"]);
    $time_now = new DateTime();
    $five_days = $time_started->add(DateInterval::createFromDateString("5 days"));

    if ($time_now < $five_days)
        return true;
    else {
        $query = "DELETE FROM user_sessions WHERE session='{$session_id}";
        $connection->query($query);

        return false;
    }
}
?>
