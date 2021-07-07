<?

require_once("../../src/components/database/dbadmins.php");

session_start();

$admins = new DBAdmins();

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);;
$password = "";
$token = filter_var($_POST["token"], FILTER_SANITIZE_STRING);
if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["token"])) {
    $newPassword = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    if ($admins->updatePassword($email, $newPassword, $token)) {
        $_SESSION["passwordResetSuccess"] = "true";
        header("Location: ../new-password.php?token={$token}&email={$email}");
        exit();
    } else {
        $_SESSION["passwordResetSuccess"] = "false";
        $_SESSION["invalidToken"] = "true";
        header("Location: ../reset-password.php");
        exit();
    }
} else {
    $_SESSION["emptyResetFields"] = "true";
    header("Location: ../new-password.php?token={$token}&email={$email}");
    exit();
}
//$admins->getAdminByToken($token);
