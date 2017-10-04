<?php

namespace Trains\Model\Locomotive;

use Trains\Model\Model;
use Trains\Entity\Locomotive\Locomotive;

class LocomotiveModel extends Model
{

    function findAll()
    {
        $sql = 'SELECT `id`, `typeid`, `serial`, `releasedate`
                FROM Locomotive
                ORDER BY id ASC';
        $result = $this->getDb()->fetchAll($sql);
        // Convert query result to an array of domain objects
        $locomotives = [];
        foreach ($result as $row) {
            $locomotiveId = $row['id'];
            $locomotives[$locomotiveId] = $this->buildEntityObject($row);
        }

        return $locomotives;
    }

    /**
     * Creates an Locomotive object based on a DB row.
     *
     * @param array $row The DB row containing Locomotive data.
     * @return \trains\Entity\Locomotive\Locomotive
     */
    protected function buildEntityObject(array $row)
    {
        $locomotiveTypeModel = new LocomotiveTypeModel($this->getDb());
        $locomotiveType = $locomotiveTypeModel->findById($row['typeid']);

        $locomotive = new Locomotive();
        $locomotive->setId($row['id']);
        // set teh type object
        $locomotive->setType($locomotiveType);
        $locomotive->setSerial($row['serial']);
        $locomotive->setReleasedate($row['releasedate']);

        return $locomotive;
    }


}

