<?php

namespace trains\Model\Car;

use trains\Model\Model;
use trains\Entity\Car;

class carModel extends Model
{

    function findAll()
    {
        $sql = 'SELECT `id`, `typeid`, `serial`
                FROM car
                ORDER BY id ASC';
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $cars = [];
        foreach ($result as $row) {
            $carId = $row['id'];
            $cars[$carId] = $this->buildEntityObject($row);
        }

        return $cars;
    }

    protected function buildEntityObject(array $row)
    {
        $carTypeModel = new LocomotiveTypeModel($this->getDb());
        $carType = $carTypeModel->findById($row['typeid']);

        $car = new Car();
        $car->setId($row['id']);
        // set teh type object
        $car->setType($carType);
        $car->setSerial($row['serial']);
        $car->setReleasedate($row['releasedate']);

        return $car;
    }


}