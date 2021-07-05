<?

require_once("../../src/components/database/dbadmins.php");

session_start();

$admins = new DBAdmins();

$email = "";
$password = "";
$token = filter_var($_POST["token"], FILTER_SANITIZE_STRING);
if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["token"])) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $newPassword = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $admins->updatePassword($email, $newPassword, $token);

    $_SESSION["passwordResetSuccess"] = "true";
    header("Location: ../new-password.php?token=" . $token);
    exit();
} else {
    $_SESSION["emptyResetFields"] = "true";
    header("Location: ../new-password.php?token=" . $token);
    exit();
}
//$admins->getAdminByToken($token);
