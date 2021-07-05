<?php
if (isset($_COOKIE["admin_credentials"])) {
    setcookie("admin_credentials", "0", time() - 5000, "/");
    header("Location: ../admin.php");
    exit();
}
