<?php

namespace trains\Model;

use Doctrine\DBAL\Connection;
use trains\Entity\Locomotive;

class LocomotiveModel
{


    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    function findAll()
    {
        /*
         * SELECT *
                FROM locomotive l
                INNER JOIN locomotivetype lt ON (l.typeid = lt.id)
                INNER JOIN energymode em ON (lt.energymode = em.id)
                ORDER BY l.id DESC
         */

        $sql = 'SELECT *
                FROM locomotive l
                ORDER BY l.id DESC';
        $result = $this->db->fetchAll($sql);
        // Convert query result to an array of domain objects
        $locomotives = [];
        foreach ($result as $row) {
            $locomotiveId = $row['id'];
            $locomotives[$locomotiveId] = $this->build($row);
        }
        return $locomotives;
    }

    /**
     * Creates an Locomotive object based on a DB row.
     *
     * @param array $row The DB row containing Locomotive data.
     * @return \trains\Entity\Locomotive
     */

    private function build(array $row)
    {
        $locomotive = new Locomotive();
        $locomotive->setId($row['id']);
        $locomotive->setSerial($row['serial']);
        $locomotive->setReleasedate($row['releasedate']);

        return $locomotive;

    }


}

