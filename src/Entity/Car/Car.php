<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 09:31
 */

namespace trains\Entity;


class Car
{

    private $id;
    private $modelid;
    private $serial;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getModelid()
    {
        return $this->modelid;
    }

    /**
     * @param mixed $modelid
     */
    public function setModelid($modelid)
    {
        $this->modelid = $modelid;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }


}