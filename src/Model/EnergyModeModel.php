<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 12:28
 */

namespace Trains\Model;

use Trains\Entity\EnergyMode;

class EnergyModeModel extends Model
{

    function findAll(): array
    {
        $sql = 'SELECT `id`, `mode`
                FROM energymode
                ORDER BY id DESC';
        $result = $this->getDb()->fetchAll($sql);
        $energyModes = [];
        foreach ($result as $row) {
            $energyModeId = $row['id'];
            $energyModes[$energyModeId] = $this->buildEntityObject($row);
        }

        return $energyModes;
    }

    function findById(int $energyModeId): EnergyMode
    {
        $sql = 'SELECT `id`, `mode`
                FROM energymode
                WHERE `id` = ?';
        $row = $this->getDb()->fetchAssoc($sql, [$energyModeId]);

        if ($row) {
            return $this->buildEntityObject($row);
        } else {
            throw new \Exception("No energy mode matching id " . $energyModeId);
        }

    }

    /**
     * Creates an energy mode object based on a DB row.
     *
     * @param array $row The DB row containing LocomotiveType data.
     * @return \Trains\Entity\EnergyMode
     */
    protected function buildEntityObject(array $row)
    {
        $EnergyMode = new EnergyMode();
        $EnergyMode->setId($row['id']);
        $EnergyMode->setMode($row['mode']);

        return $EnergyMode;

    }

}