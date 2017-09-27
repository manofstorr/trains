<?php

use PHPUnit\Framework\TestCase;
use trains\Metier\showcase;

class showcaseTest extends TestCase
{
    public function testSquare()
    {
        $this->assertEquals(16, showcase::square(4));
    }

    public function testSquareIfZero()
    {
        $this->assertEquals(0, showcase::square(0));
    }

    public function testSquareIfOne()
    {
        $this->assertEquals(1, showcase::square(1));
    }
}