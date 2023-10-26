<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayListInteger;

$list = new ArrayListInteger();

$list[] = 1;
$list[1] = 2;

print_r($list->toArray());

foreach ($list as $item) {
    echo $item . PHP_EOL;
}