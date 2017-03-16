<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:53
 */

namespace BDD\Table;


class Crossing
{
    private $_id;
    private $_date;
    private $_timeStart;
    private $_link;
    private $_boat;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @param mixed $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->_timeStart = $timeStart;
    }

    /**
     * @param mixed $link
     */
    public function setLink(Link $link)
    {
        $this->_link = $link;
    }

    /**
     * @param mixed $boat
     */
    public function setBoat(Boat $boat)
    {
        $this->_boat = $boat;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return mixed
     */
    public function getTimeStart()
    {
        return $this->_timeStart;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @return mixed
     */
    public function getBoat()
    {
        return $this->_boat;
    }
}