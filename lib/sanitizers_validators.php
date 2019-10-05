<?php
function sanitizeName(string $name): string {
    /**
     * Sanitizes the supplied tag from the $_GET get request variables
     * @var $name string := The name requested by the user.
     */
    return $name;
}

function validatePicture($url) {
    // TODO: Check if the fetched resource is a image or not
    return filter_var($url, FILTER_VALIDATE_URL);
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

function checkActiveSession(string $session_id): bool {
    $connection = new mysqli("localhost", "bookstore", "bookstore", "authentication");
    // If a session is present, it would return the active time in hh:mm:ss 
    $query = "SELECT TIMEDIFF(NOW(), started) AS timedelta FROM user_sessions WHERE session = '{$session_id}'";
    $result = $connection->query($query);

    if ($result->num_rows < 1)
        return false;
    
    $result = $result->fetch_assoc();

    // Convert the returned time difference to UNIX timestamp.
    $time_active = new DateTime($result["timedelta"]);
    $fifteen_days = new DateTime("15 days");

    if ($time_active < $fifteen_days)
        return true;
    else {
        $query = "DELETE FROM user_sessions WHERE session='{$session_id}";
        $connection->query($query);

        return false;
    }
}
?>
