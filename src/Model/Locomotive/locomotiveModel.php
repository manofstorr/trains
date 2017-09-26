<?php

namespace trains\Model\Locomotive;

use trains\Model\Model;
use trains\Entity\Locomotive\Locomotive;

class LocomotiveModel extends Model
{

    function findAll()
    {
        $sql = 'SELECT *
                FROM locomotive l
                ORDER BY l.id DESC';
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
     * @return \trains\Entity\Locomotive
     */

    protected function buildEntityObject(array $row)
    {
        $locomotive = new Locomotive();
        $locomotive->setId($row['id']);
        $locomotive->setSerial($row['serial']);
        $locomotive->setReleasedate($row['releasedate']);

        return $locomotive;

    }


}

