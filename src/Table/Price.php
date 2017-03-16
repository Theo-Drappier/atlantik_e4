<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:54
 */

namespace BDD\Table;


class Price
{
    private $_id;
    private $_link;
    private $_type;
    private $_period;
    private $_price;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $link
     */
    public function setLink(Link $link)
    {
        $this->_link = $link;
    }

    /**
     * @param mixed $type
     */
    public function setType(Type $type)
    {
        $this->_type = $type;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod(Period $period)
    {
        $this->_period = $period;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
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
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->_period;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }
}