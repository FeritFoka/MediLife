<?php

require_once("../../src/components/database/dbadmins.php");
require_once("../../src/components/email/Mailer.php");
require_once("../../src/components/email/MailSettings.php");

session_start();

if (!empty($_POST["email"])) {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $dbAdmins = new DBAdmins();

    if ($dbAdmins->checkIfEmailInDatabase($email)) {
        $_SESSION["resetEmailValidity"] = "true";
        $_SESSION["email"] = $email;



        $adminId = $dbAdmins->getAdminsIdByEmail($email);
        $adminOldPassword = $dbAdmins->getAdminsPassById($adminId);

        $token = password_hash($adminOldPassword . $adminId, PASSWORD_DEFAULT);

        $baseLink = MailSettings::PASSWORD_RESET_BASE_LINK;
        $resetLink = <<<HTML
        <a href="{$baseLink}?token={$token}&email={$email}">here</a>
        HTML;

        $mailer = new Mailer();
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
