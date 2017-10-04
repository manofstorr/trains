<?php

namespace Trains\Model\Car;

use Trains\Model\Model;
use Trains\Entity\Car\Car;

class CarModel extends Model
{

    public function findAll()
    {
        $sql = 'SELECT `id`, `typeid`, `serial`
                FROM Car
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

    public function buildEntityObject(array $row)
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

    public function carsCountByType()
    {
        $sql = 'SELECT `typeid`, COUNT(`id`) AS C
                FROM Car
                GROUP BY (`typeid`)
                ORDER BY id ASC';
        $result = $this->getDb()->fetchAll($sql);
        $carsCountByType = [];
        foreach ($result as $row) {
            $carsCountByType[$row['typeid']] = $row['C'];
        }

        return $carsCountByType;
    }

    public function carGenerator()
    {
        yield from $this->load_from_database();
    }

    public function load_from_database()
    {
        $sql = 'SELECT `id`, `typeid`, `serial`
                FROM Car
                ORDER BY id ASC';

        return $this->getDb()->fetchAll($sql);
    }

    public function save(Car $car)
    {
        $stmt = $this->getDb()->prepare('INSERT INTO Car
            (`id`, `typeid`, `serial`) 
            VALUES
            (null, :type, :serial)');
        $stmt->execute(
            [
                'type'   => $car->getType()->getId(),
                'serial' => $car->getSerial(),
            ]);

        return $this->getDb()->lastInsertId();
    }

    public function getLastInsertedCar()
    {
        $sql = 'SELECT `id`, `typeid`, `serial`
                FROM Car
                ORDER BY `id` DESC LIMIT 1';
        $row = $this->getDb()->fetchAssoc($sql);

        return $this->buildEntityObject($row);
    }

}