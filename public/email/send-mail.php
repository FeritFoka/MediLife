<?php

session_start();

require_once("../../src/components/email/Mailer.php");

$name = "";
$email = "";
$phone = "";
$msg = "";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["message"])) {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);


    $mailer = new Mailer();

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $mailer->sendEmail($name, $email, $phone, $msg) == "Message sent!") {
        $_SESSION["mailOutStatus"] = "success";
    } else {
        $_SESSION["mailOutStatus"] = "failure";
    }
} else {
    $_SESSION["mailOutStatus"] = "failure";
}

header("Location: ../send-email.php");
exit();
