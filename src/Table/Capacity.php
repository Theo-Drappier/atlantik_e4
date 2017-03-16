<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:52
 */

namespace BDD\Table;


class Capacity
{
    private $_id;
    private $_number;
    private $_category;
    private $_boat;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->_number = $number;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(Category $category)
    {
        $this->_category = $category;
    }

    /**
     * @param mixed $boat
     */
    public function setBoat($boat)
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
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * @return mixed
     */
    public function getBoat()
    {
        return $this->_boat;
    }
}