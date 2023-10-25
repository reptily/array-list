<?php

namespace Reptily\ArrayList;

trait IteratorTrait
{
    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->list[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->list[$this->position]);
    }
}