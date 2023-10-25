<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayListInteger;

$list = new ArrayListInteger();
$list->add(1);
$list->add(2);
$list->add(3);

foreach ($list as $item) {
    echo $item . PHP_EOL;
}

echo $list[0] . PHP_EOL;
