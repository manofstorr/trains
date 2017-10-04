<?php

namespace Trains\Metier;

trait CarMetier
{

    public function getRandomCarData()
    {
        $carTypes = [
            1 => 'Fret',
            2 => 'Fret',
            3 => 'Acier',
            4 => 'Grain',
        ];

        $carType = rand(1, 4);
        $carSerialPrefix = substr($carTypes[$carType], 0, 2) . $carType;
        $carSerial = $carSerialPrefix . 'S' . rand(10000, 99999);

        return ['type' => $carType, 'serial' => $carSerial];
    }

}
