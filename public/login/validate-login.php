<?php

require_once("../../src/components/database/dbadmins.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $adminChecker = new DBAdmins();

    if ($adminChecker->checkIfLoginIsValid($email, $password)) {
        setcookie("admin_credentials", "1", 0, "/");
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: ../admin.php");
        exit();
    }
} else {
    header("Location: ../admin.php");
    exit();
}
