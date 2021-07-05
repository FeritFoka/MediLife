<?php

require_once("../../src/components/database/dbadmins.php");

session_start();

if (!empty($_POST["email"])) {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $adminChecker = new DBAdmins();

    if ($adminChecker->checkIfEmailInDatabase($email)) {
        $_SESSION["resetEmailValidity"] = "true";
        header("Location: ../reset-password.php");
        exit();
    } else {
        $_SESSION["resetEmailValidity"] = "false";
        header("Location: ../reset-password.php");
        exit();
    }
} else {
    $_SESSION["noResetEmail"] = "true";
    header("Location: ../reset-password.php");
    exit();
}
