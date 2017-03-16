<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:54
 */

namespace BDD\Table;


class Link
{
    private $_id;
    private $_startingHarbor;
    private $_arrivalHarbor;
    private $_sector;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $startingHarbor
     */
    public function setStartingHarbor(Harbor $startingHarbor)
    {
        $this->_startingHarbor = $startingHarbor;
    }

    /**
     * @param mixed $arrivalHarbor
     */
    public function setArrivalHarbor(Harbor $arrivalHarbor)
    {
        $this->_arrivalHarbor = $arrivalHarbor;
    }

    /**
     * @param mixed $sector
     */
    public function setSector(Sector $sector)
    {
        $this->_sector = $sector;
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
    public function getStartingHarbor()
    {
        return $this->_startingHarbor;
    }

    /**
     * @return mixed
     */
    public function getArrivalHarbor()
    {
        return $this->_arrivalHarbor;
    }

    /**
     * @return mixed
     */
    public function getSector()
    {
        return $this->_sector;
    }
}