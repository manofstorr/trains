<?php

namespace trains\Model\Locomotive;

use trains\Model\Model;
use trains\Entity\Locomotive\LocomotiveType;

class LocomotiveTypeModel extends Model
{

    function findAll()
    {
        $sql = 'SELECT *
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

    /**
     * Creates an Locomotivetype object based on a DB row.
     *
     * @param array $row The DB row containing LocomotiveType data.
     * @return \trains\Entity\LocomotiveType
     */
    protected function buildEntityObject(array $row)
    {
        $locomotiveType = new LocomotiveType();
        $locomotiveType->setId($row['id']);
        $locomotiveType->setDesignation($row['designation']);
        $locomotiveType->setEnergymodeid($row['energymodeid']);
        $locomotiveType->setResume($row['resume']);
        $locomotiveType->setDescription($row['description']);

        return $locomotiveType;

    }


}

