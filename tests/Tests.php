<?php

namespace Reptily\ArrayList\Tests;

use PHPUnit\Framework\TestCase;
use Reptily\ArrayList\ArrayList;

class Tests extends TestCase
{
    public function testAdd(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');

        $this->assertSame($list->count(), 1);
    }

    public function testCount(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $this->assertSame($list->count(), 0);

        $list->add('test');
        $this->assertSame($list->count(), 1);

        $list->add('test2');
        $this->assertSame($list->count(), 2);
    }

    public function testIsEmpty(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $this->assertTrue($list->isEmpty());

        $list->add('test');
        $this->assertFalse($list->isEmpty());
    }

    public function testIndexOf(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $this->assertNull($list->indexOf('test'));

        $list->add('test');
        $this->assertSame($list->indexOf('test'), 0);

        $list->add('test2');
        $this->assertSame($list->indexOf('test2'), 1);
    }

    public function testLastIndexOf(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $this->assertNull($list->lastIndexOf());

        $list->add('test');
        $this->assertSame($list->lastIndexOf(), 0);

        $list->add('test2');
        $this->assertSame($list->lastIndexOf(), 1);
    }

    public function testClone(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $listClone = $list->clone();

        $this->assertInstanceOf(ArrayList::class, $listClone);
    }

    public function testToArray(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');

        $this->assertSame($list->toArray(), ['test']);
    }

    public function testGet(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');

        $this->assertSame($list->get(0), 'test');
    }

    public function testSet(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');
        $list->set(0, 'test_set');

        $this->assertSame($list->get(0), 'test_set');
    }

    public function testExists(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $this->assertFalse($list->exists(0));

        $list->add('test');
        $this->assertTrue($list->exists(0));
    }

    public function testRemove(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');
        $this->assertTrue($list->exists(0));

        $list->remove(0);
        $this->assertFalse($list->exists(0));
    }

    public function testClear(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list->add('test');
        $this->assertSame($list->count(), 1);

        $list->clear();
        $this->assertSame($list->count(), 0);
    }

    public function testAddAll(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $testItem = ['test', 'test2'];
        $list->addAll($testItem);

        $this->assertSame($list->count(), 2);
    }

    public function testForEach(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $testItem = ['test', 'test2'];
        $list->addAll($testItem);

        $list->forEach(function ($item, $index) use ($testItem) {
            $this->assertSame($testItem[$index], $item);
        });

        $list->forEach(function ($item) {
            $this->assertNotEmpty($item);
        });
    }

    public function testSort(): void
    {
        $list = new ArrayList(ArrayList::TYPE_INTEGER);
        $testItem = [3, 1, 5, 4, 2];
        $list->addAll($testItem);

        $this->assertSame($testItem, $list->toArray());

        $list->sort();
        $this->assertSame([1, 2, 3, 4, 5], $list->toArray());

        $list->sort(ArrayList::SORT_DESC);
        $this->assertSame([5, 4, 3, 2, 1], $list->toArray());
    }

    public function testTypes(): void
    {
        $obj = new class {};
        $list = new ArrayList(get_class($obj));

        $list->add($obj);
        $this->assertSame($list->get(0), $obj);
    }

    public function testAddUseAsArray(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list[] = 'test';

        $this->assertSame($list->count(), 1);

        $list[1] = 'test';
        $this->assertSame($list->count(), 2);
    }

    public function testCountAsArray(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list[] = 'test';

        $this->assertSame(count($list), 1);
    }

    public function testRemoveAsArray(): void
    {
        $list = new ArrayList(ArrayList::TYPE_STRING);
        $list[] = 'test';
        $this->assertTrue($list->exists(0));

        unset($list[0]);
        $this->assertFalse($list->exists(0));
    }
}