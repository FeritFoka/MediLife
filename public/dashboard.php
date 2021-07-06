<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <link rel="stylesheet" href="./dist/style.css">
    <link href="styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/kendo.default.min.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.web.min.js"></script>
    <title>MediLife</title>
</head>

<body class="admin-login-background">

    <?php require_once './lib/Kendo/Autoload.php'; ?>
    <?php
    // Instantiate a new instance of the DatePicker class and specify its 'id'
    $datepicker = new \Kendo\UI\DatePicker('datepicker');

    // Configure the datepicker using the fluent API
    $datepicker->start('year')
               ->format('MMMM yyyy');

    // Output the datepicker HTML and JavaScript by echo-ing the result of the render method
    echo $datepicker->render();
    ?>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <script src="./dist/bundle.js"></script>

</body>

</html>