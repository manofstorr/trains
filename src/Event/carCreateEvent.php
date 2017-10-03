<?php
namespace trains\Event;

use Symfony\Component\EventDispatcher\Event;
use trains\Entity\Car\Car;

class carCreateEvent extends Event
{
    const NAME = 'carcreate';

    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getCar()
    {
        return $this->car;
    }
}