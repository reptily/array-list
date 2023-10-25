<?php

namespace Reptily\ArrayList;

class ArrayListInteger extends ArrayList
{
    public function __construct(?array $items = null)
    {
        parent::__construct(ArrayList::TYPE_INTEGER, $items);
    }
}