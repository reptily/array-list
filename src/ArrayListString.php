<?php

namespace Reptily\ArrayList;

class ArrayListString extends ArrayList
{
    public function __construct(?array $items = null)
    {
        parent::__construct(ArrayList::TYPE_STRING, $items);
    }
}