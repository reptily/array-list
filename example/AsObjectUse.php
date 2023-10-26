<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayListInteger;

$list = new ArrayListInteger();

$list->add(1);
$list->add(2);

$list->forEach(function ($item) {
   echo $item . PHP_EOL;
});