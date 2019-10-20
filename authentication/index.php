<?php
    // If the just /admin/ is requested then promptly redirect to /admin/login.php
    header("Location: /authentication/login.php", true, 302);
?>
