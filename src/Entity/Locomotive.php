<?php
/**
 * Created by PhpStorm.
 * User: d.baudry
 * Date: 26/09/2017
 * Time: 09:24
 */

namespace trains\Entity;


class Locomotive
{

    private $id;
    private $typeid;
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
    public function getTypeid()
    {
        return $this->typeid;
    }

    /**
     * @param mixed $typeid
     */
    public function setTypeid($typeid)
    {
        $this->typeid = $typeid;
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