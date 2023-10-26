<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayListInteger;

$ids = new ArrayListInteger();

$ids->addAll([1, 2, 3, 4, 5]);

function showIds(ArrayListInteger $ids)
{
    foreach ($ids as $id) {
        echo $id . PHP_EOL;
    }
}
showIds($ids);