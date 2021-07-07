<?php

    $appbar = new \Kendo\UI\AppBar('header');
    $appbar->position("top");
    $appbar->positionMode('sticky');

    $logoItem = new \Kendo\UI\AppBarItem();
    $logoItem->type('contentItem');
    $logoItem->template('<img src="./images/logo.png" width="150px", height="50px"');

    $homeItem = new \Kendo\UI\AppBarItem();
    $homeItem->type('contentItem');
    $homeItem->template('<a href="./dashboard.php" class="navigation">Home</a>');

    $findItem = new \Kendo\UI\AppBarItem();
    $findItem->type('contentItem');
    $findItem->template('<a href="./search.php" class="navigation">Find</a>');

    $statsItem = new \Kendo\UI\AppBarItem();
    $statsItem->type('contentItem');
    $statsItem->template('<a href="./stats.php" class="navigation">Statistics</a>');

    $spacer = new \Kendo\UI\AppBarItem();
    $spacer->type('spacer');
    $spacer->width(30.0);

    $appbar->addItem($logoItem);
    $appbar->addItem($spacer);
    $appbar->addItem($homeItem);
    $appbar->addItem($spacer);
    $appbar->addItem($findItem);
    $appbar->addItem($spacer);
    $appbar->addItem($statsItem);

    echo $appbar->render();
