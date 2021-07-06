<? session_start();
if (empty($_GET["token"])) {
    header("Location: ./admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <link rel="stylesheet" href="./dist/style.css">

    <title>MediLife</title>
</head>

<body class="forgot-pass-background">

    <section class="section-forgot-pass">
        <? if ($_SESSION["passwordResetSuccess"] == "true") : ?>
            <form class="forgot-pass-container forgot-pass-form" method="post" action="./index.php">
                <? $_SESSION["passwordResetSuccess"] = "" ?>
                <h1 aria-readonly="true" style="margin-bottom: 20px;">Password Successfully Reset</h1>
                <button type=" submit" role="button" aria-pressed="false" class="forgot-pass-button">Home</button>

            </form>
        <? else : ?>
            <form class="forgot-pass-container forgot-pass-form" method="post" action="./login/update-password.php">

                <h1 aria-readonly="true">Reset Password</h1>

                <span class="forgot-pass-panel">Reset password for <? echo filter_var($_GET["email"], FILTER_SANITIZE_EMAIL); ?></span>

                <input role="input" type="hidden" name="email" value="<? echo filter_var($_GET["email"], FILTER_SANITIZE_EMAIL); ?>" />
                <input role="input" class="forgot-pass-input" type="password" name="password" placeholder="New Password" />

                <? if ($_SESSION["emptyResetFields"] == "true") : ?>
                    <p class="reset-pass-msg">Enter all of the fields.</p>
                <? endif ?>
                <input role="input" type="hidden" name="token" value="<? echo filter_var($_GET["token"], FILTER_SANITIZE_STRING); ?>">
                <button type=" submit" role="button" aria-pressed="false" class="forgot-pass-button">Save password</button>

            </form>

    </section>

<? endif ?>

<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
<script src="./dist/bundle.js"></script>

</body>

</html>

<? $_SESSION["emptyResetFields"] = ""; ?>