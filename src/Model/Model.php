<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 11:10
 */

namespace Trains\Model;

use Doctrine\DBAL\Connection;

abstract class Model
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

    /**
     * Grants access to the database connection object
     *
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDb() {
        return $this->db;
    }

    /**
     * Builds a domain/entity object from a DB row.
     * Must be overridden by child classes.
     */
    protected abstract function buildEntityObject(array $row);

}