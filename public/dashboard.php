<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <link rel="stylesheet" href="./dist/style.css">
    <link href="styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/kendo.blueopal.min.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.web.min.js"></script>
    <title>MediLife</title>
</head>

<body class="dashboard_body">

    <?php require_once './lib/Kendo/Autoload.php'; ?>
    <?php include "../src/components/dashboard/header.php"; ?>
    <?php include "../src/components/dashboard/home.php"; ?>
    <?php include "../src/components/dashboard/footer.php"; ?>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <script src="./dist/bundle.js"></script>

</body>

</html>