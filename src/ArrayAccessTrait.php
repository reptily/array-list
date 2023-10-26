<?php

namespace Reptily\ArrayList;

trait ArrayAccessTrait
{
    public function offsetExists($index)
    {
        return $this->exists($index);
    }

    public function offsetGet($index)
    {
        return $this->get($index);
    }

    public function offsetSet($index, $item)
    {
        if ($index === null) {
            $this->add($item);

            return;
        }

        if (!$this->exists($index)) {
            $this->add($item);

            return;
        }

        $this->set($index, $item);
    }

    public function offsetUnset($index)
    {
        $this->remove($index);
    }
}