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
    private $_crossing;
    private $_user;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $crossing
     */
    public function setCrossing(Crossing $crossing)
    {
        $this->_crossing = $crossing;
    }

    /**
     * @param mixed $user
     */
    public function setUser(Users $user)
    {
        $this->_user = $user;
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
    public function getCrossing()
    {
        return $this->_crossing;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_user;
    }

}