<?php

    $appbar = new \Kendo\UI\AppBar('header');
    $appbar->position("top");
    $appbar->positionMode('sticky');

    $logoItem = new \Kendo\UI\AppBarItem();
    $logoItem->type('contentItem');
    $logoItem->template('<a href="./index.php"><img src="./images/logo.png" class="logo"></img></a>');

    $homeItem = new \Kendo\UI\AppBarItem();
    $homeItem->type('contentItem');
    $homeItem->template('<a href="./dashboard.php" class="navigation">Home</a>');

    $findItem = new \Kendo\UI\AppBarItem();
    $findItem->type('contentItem');
    $findItem->template('<a href="./search.php" class="navigation">Find</a>');

    $logoutItem = new \Kendo\UI\AppBarItem();
    $logoutItem->type('contentItem');
    $logoutItem->template('<form action="./login/logout.php" method="post"><button type="submit" class="navigation">Logout</button></form>');

    $spacer = new \Kendo\UI\AppBarItem();
    $spacer->type('spacer');
    $spacer->width(30.0);

    $appbar->addItem($logoItem);
    $appbar->addItem($spacer);
    $appbar->addItem($homeItem);
    $appbar->addItem($spacer);
    $appbar->addItem($findItem);
    $appbar->addItem($spacer);
    $appbar->addItem($logoutItem);

    echo $appbar->render();
