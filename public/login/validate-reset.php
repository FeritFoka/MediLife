<?php

require_once("../../src/components/database/dbadmins.php");
require_once("../../src/components/email/Mailer.php");
require_once("../../src/components/email/MailSettings.php");

session_start();

if (!empty($_POST["email"])) {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $adminChecker = new DBAdmins();

    if ($adminChecker->checkIfEmailInDatabase($email)) {
        $_SESSION["resetEmailValidity"] = "true";
        $_SESSION["email"] = $email;

        $mailer = new Mailer();
        $adminId = $adminChecker->getAdminsIdByEmail($email);
        $token = password_hash($adminId, PASSWORD_DEFAULT);

        $resetLink = <<<HTML
        <a href="localhost/public/new-password.php?token={$token}">here</a>
        HTML;
        $mailer->sendEmail("Medilife Admin Reset", MailSettings::EMAIL, NULL, "Click " . $resetLink . " to reset password.");

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
