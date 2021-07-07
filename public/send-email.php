<?
session_start();

$msg = "";

if ($_SESSION["mailOutStatus"] == "failure") {
    $msg = "Enter all fields correctly.";
} else if ($_SESSION["mailOutStatus"] == "success") {
    $msg = "Mail sent!";
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

<body class="send-email-background">

    <?php include "../src/components/send-email-form.php"; ?>

    <?
    if ($msg != "") {
        echo <<<TEXT
      <p class="email-info">{$msg}</p>
      TEXT;
    }
    $_SESSION["mailOutStatus"] = "";
    ?>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <script src="./dist/bundle.js"></script>

</body>

</html>