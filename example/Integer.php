<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayListInteger;

$list = new ArrayListInteger();
$list->add(1);
$list->add(2);
$list->add(3);

print_r($list->toArray());
