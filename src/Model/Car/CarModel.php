<?php

namespace trains\Model\Car;

use trains\Model\Model;
use trains\Entity\Car\Car;

class CarModel extends Model
{

    public function findAll()
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

    public function carsCountByType ()
    {
        $sql = 'SELECT `typeid`, COUNT(`id`) AS C
                FROM car
                GROUP BY (`typeid`)
                ORDER BY id ASC';
        $result = $this->getDb()->fetchAll($sql);
        $carsCountByType = [];
        foreach ($result as $row) {
            $carsCountByType[$row['typeid']] = $row['C'];
        }
        return $carsCountByType;
    }

    protected function buildEntityObject(array $row)
    {
        $carTypeModel = new carTypeModel($this->getDb());
        $carType = $carTypeModel->findById($row['typeid']);

        $car = new Car();
        $car->setId($row['id']);
        // set the type object
        $car->setType($carType);
        $car->setSerial($row['serial']);


        return $car;
    }


}