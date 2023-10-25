<?php

namespace Reptily\ArrayList;

use ArrayAccess;
use Exception;
use Iterator;

class ArrayList implements Iterator, ArrayAccess
{
    use IteratorTrait;
    use ArrayAccessTrait;

    public const TYPE_STRING = 'string';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_FLOAT = 'float';
    public const SORT_DESC = 'desc';
    public const SORT_ASC = 'asc';

    private $list = [];
    private $type;
    private $position = 0;

    public function __construct(string $type, ?array $items = null)
    {
        $this->type = $type;
        if ($items !== null) {
            $this->addAll($items);
        }
    }

    public function __call($name, $arguments)
    {
        var_dump($name);
    }

    public function count(): int
    {
        return count($this->list);
    }

    public function isEmpty(): bool
    {
        return empty($this->list);
    }

    public function indexOf($element): ?int
    {
        foreach ($this->list as $index => $item) {
            if ($item === $element) {
                return $index;
            }
        }

        return null;
    }

    public function lastIndexOf(): ?int
    {
        return array_key_last($this->list);
    }

    public function clone(): ArrayList
    {
        return clone $this;
    }

    public function toArray(): array
    {
        return $this->list;
    }

    public function add($item): void
    {
        $this->checkType($item);

        $this->list[] = $item;
    }

    public function addAll(array $items): void
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    public function get(int $index)
    {
        $this->checkItemExists($index);

        return $this->list[$index];
    }

    public function set(int $index, $item): void
    {
        $this->checkItemExists($index);
        $this->checkType($item);

        $this->list[$index] = $item;
    }

    public function exists(int $index): bool
    {
        return isset($this->list[$index]);
    }

    public function remove(int $index): void
    {
        $this->checkItemExists($index);

        unset($this->list[$index]);
    }

    public function clear(): void
    {
        $this->list = [];
    }

    public function forEach($callback) {
        foreach ($this->list as $index => $item) {
            $callback($item, $index);
        }
    }

    public function sort(string $flags = self::SORT_ASC): void
    {
        if ($flags === self::SORT_ASC) {
            sort($this->list);
        } else {
            rsort($this->list);
        }
    }

    private function checkType($item)
    {
        if (is_object($item)) {
            if (!$item instanceof $this->type) {
                throw new \Exception('Type is not correct');
            }
        } elseif (gettype($item) !== $this->type) {
            throw new \Exception('Type is not correct');
        }
    }

    private function checkItemExists(int $index)
    {
        if (!isset($this->list[$index])) {
            throw new Exception('Item not found');
        }
    }
}