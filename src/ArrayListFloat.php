<?php

namespace Reptily\ArrayList;

class ArrayListFloat extends ArrayList
{
    public function __construct(?array $items = null)
    {
        parent::__construct(ArrayList::TYPE_FLOAT, $items);
    }
}