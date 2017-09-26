<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 09:24
 */

namespace trains\Entity\Locomotive;


class Locomotive
{

    private $id;

    /**
     * Associated locomotive type.
     *
     * @var \trains\Entity\Locomotive\LocomotiveType
     */
    private $type;

    private $serial;

    private $releasedate;

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
    public function getType()
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

    /**
     * @return mixed
     */
    public function getReleasedate()
    {
        return $this->releasedate;
    }

    /**
     * @param mixed $releasedate
     */
    public function setReleasedate($releasedate)
    {
        $this->releasedate = $releasedate;
    }




}