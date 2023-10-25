<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayList;

$list = new ArrayList(ArrayList::TYPE_INTEGER);
$list->add(1);
$list->add(2);
$list->add(3);

print_r($list->toArray());