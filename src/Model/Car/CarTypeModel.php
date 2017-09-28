<?php

namespace trains\Model\Car;

use trains\Model\Model;
use trains\Entity\Car\CarType;

class CarTypeModel extends Model
{

    function findAll(): array
    {
        $sql = 'SELECT `id`, `cargo`, `payload`
                FROM cartype
                ORDER BY id DESC';
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $carTypes = [];
        foreach ($result as $row) {
            $carTypeId = $row['id'];
            $carTypes[$carTypeId] = $this->buildEntityObject($row);
        }

        return $carTypes;
    }


    function findById(int $carTypeId): CarType
    {
        $sql = 'SELECT `id`, `cargo`, `payload`
                FROM cartype
                WHERE `id` = ?';
        $row = $this->getDb()->fetchAssoc($sql, [$carTypeId]);

        if ($row) {
            return $this->buildEntityObject($row);
        } else {
            throw new \Exception("No car type matching id " . $carTypeId);
        }
    }


    /**
     * Creates an cartype object based on a DB row.
     *
     * @param array $row The DB row containing CarType data.
     * @return \trains\Entity\Car\CarType
     */
    protected function buildEntityObject(array $row)
    {
        $carType = new carType();
        $carType->setId($row['id']);
        $carType->setCargo($row['cargo']);
        $carType->setPayload($row['payload']);

        return $carType;

    }

}

