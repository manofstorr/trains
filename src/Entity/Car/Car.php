<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 09:31
 */

namespace Trains\Entity\Car;

use Silex\Application;

class Car
{

    private $id;
    /**
     * Associated Car type.
     *
     * @var \trains\Entity\Car\CarType
     */
    private $type;
    private $serial;

    /**
     *
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
    public function getType(): CarType
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

    /*
     * Other methods
     */

    public function isValid()
    {
        if (!($this->getType()InstanceOf CarType)) {
            return false;
        }
        if ($this->getSerial() == '') {
            return false;
        }

        return true;
    }

    public function persist(Application $app)
    {
        $newCarId = $app['model.Car']->save($this);
        if ($newCarId) {
            $this->setId($newCarId);
        } else {
            // throwing exception avoid listener to send message in case of create NOK
            throw new \Exception('Car creation has failed.');
        }
    }

}