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

<body>

    <?php include "../src/components/header.php"; ?>

    <?php include "../src/components/nav.php"; ?>

    <?php include "../src/components/medilife-about-card.php"; ?>

    <?php include "../src/components/medilife-doctors-card.php"; ?>

    <?php include "../src/components/medilife-news-card.php"; ?>

    <?php include "../src/components/medilife-find-us.php"; ?>

    <?php include "../src/components/footer.php"; ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <script src="./dist/bundle.js"></script>
</body>

</html>