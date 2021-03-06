<?php

namespace Trains\Model\Locomotive;

use Trains\Model\EnergyModeModel;
use Trains\Model\Model;
use Trains\Entity\Locomotive\LocomotiveType;
use Trains\Model\EnergyMode;

class LocomotiveTypeModel extends Model
{

    function findAll(): array
    {
        $sql = 'SELECT `id`, `designation`, `energymodeid`, `resume`, `description`
                FROM locomotivetype
                ORDER BY id DESC';
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $locomotiveTypes = [];
        foreach ($result as $row) {
            $locomotiveTypeId = $row['id'];
            $locomotiveTypes[$locomotiveTypeId] = $this->buildEntityObject($row);
        }

        return $locomotiveTypes;
    }


    function findById(int $locomotiveTypeId): LocomotiveType
    {
        $sql = 'SELECT `id`, `designation`, `energymodeid`, `resume`, `description`
                FROM locomotivetype
                WHERE `id` = ?';
        $row = $this->getDb()->fetchAssoc($sql, [$locomotiveTypeId]);

        if ($row) {
            return $this->buildEntityObject($row);
        } else {
            throw new \Exception("No Locomotive type matching id " . $locomotiveTypeId);
        }

    }


    /**
     * Creates an Locomotivetype object based on a DB row.
     *
     * @param array $row The DB row containing LocomotiveType data.
     * @return \trains\Entity\Locomotive\LocomotiveType
     */
    protected function buildEntityObject(array $row)
    {
        $energyModeModel = new EnergyModeModel($this->getDb());
        $energyMode = $energyModeModel->findById($row['energymodeid']);

        $locomotiveType = new LocomotiveType();
        $locomotiveType->setId($row['id']);
        $locomotiveType->setDesignation($row['designation']);
        // here set an object
        $locomotiveType->setEnergymode($energyMode);
        $locomotiveType->setResume($row['resume']);
        $locomotiveType->setDescription($row['description']);

        return $locomotiveType;

    }

}

