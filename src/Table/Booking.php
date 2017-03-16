<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:52
 */

namespace BDD\Table;


class Booking
{
    private $_id;
    private $_name;
    private $_postcode;
    private $_city;
    private $_crossing;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->_postcode = $postcode;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @param mixed $crossing
     */
    public function setCrossing(Crossing $crossing)
    {
        $this->_crossing = $crossing;
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
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->_postcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @return mixed
     */
    public function getCrossing()
    {
        return $this->_crossing;
    }

}