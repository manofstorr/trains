<?php
namespace Trains\Event;

use Symfony\Component\EventDispatcher\Event;
use Trains\Entity\Car\Car;

class CarCreateEvent extends Event
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