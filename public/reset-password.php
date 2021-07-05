<?
session_start();
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

        <form class="forgot-pass-container forgot-pass-form" method="post" action="./login/validate-reset.php">
            <h1 aria-readonly="true">Reset Password</h1>
            <span class="forgot-pass-panel">Enter your email</span>
            <input role="input" class="forgot-pass-input" type="email" name="email" placeholder="Email" />
            <?php if ($_SESSION["resetEmailValidity"] == "true") : ?>
                <p class="reset-pass-msg">Enter your new password.</p>
                <input role="input" class="forgot-pass-input" type="password" name="password" placeholder="New password" />
            <?php endif ?>

            <?php if ($_SESSION["resetEmailValidity"] == "false") : ?>
                <p class="reset-pass-msg">Email you provided is not an admin.</p>

            <?php endif ?>

            <?php if ($_SESSION["noResetEmail"] == "true") : ?>
                <p class="reset-pass-msg">Enter email for the account you wish to reset.</p>

            <?php endif ?>
            <button type="submit" role="button" aria-pressed="false" class="forgot-pass-button">Send reset link</button>
        </form>

    </section>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <script src="./dist/bundle.js"></script>

</body>

</html>

<?
$_SESSION["resetEmailValidity"] = "";
$_SESSION["noResetEmail"] = ""
?>