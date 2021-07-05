<?php

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
} else {

    header("Location: ../send-email.php");
    exit();
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $mailer = new Mailer();
    $mailer->sendEmail($name, $email, $phone, $msg);
} else {
    echo "Smth failed";
    // TODO SESSION ALERT
}
