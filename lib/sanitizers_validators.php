<?php
function sanitizeName($name) {
    /**
     * Sanitizes the supplied tag from the $_GET get request variables
     * @var $name string := The name requested by the user.
     */
    return $name;
}


function sanitizeEmail(string $email): string {
    /**
     * Sanitizes if the supplied string is a valid email or not
     * @var $email string := The email to validate
    **/

    return filter_var($email, FILTER_SANITIZE_EMAIL);
}
?>
