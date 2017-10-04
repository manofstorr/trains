<?php

namespace Trains\Model\Car;


class CarsIterator implements \Iterator
{
    private $position = 0;
    private $cars = [];

    public function __construct() {
        $this->position = 0;
    }

    public function fill(array $cars) {
        foreach ($cars as $car) {
            $this->cars[$this->position] = $car;
            $this->next();
        }
        $this->rewind();
    }

    public function current()
    {
        return $this->cars[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->cars[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }


}