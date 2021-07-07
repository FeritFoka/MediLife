<?php

    $appbar = new \Kendo\UI\AppBar('footer');
    $appbar->position("bottom");
    $appbar->positionMode('fixed');

    $madeWithItem = new \Kendo\UI\AppBarItem();
    $madeWithItem->type('contentItem');
    $madeWithItem->template('
    Web application is made using the following technologies:
    <ul>
        <li>HTML5</li>
        <li>PHP</li>
        <li>Sass</li>
        <li>Kendo UI for PHP</li>
        <li>MySQL</li>
    </ul>
    ');

    $madeByItem = new \Kendo\UI\AppBarItem();
    $madeByItem->type('contentItem');
    $madeByItem->template('Web application was made by Stjepan Mrganić, Petra Radočaj i Dominik Ričko.');

    $spacer = new \Kendo\UI\AppBarItem();
    $spacer->type('spacer');

    $appbar->addItem($madeWithItem);
    $appbar->addItem($spacer);
    $appbar->addItem($madeByItem);

    echo $appbar->render();
