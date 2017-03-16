<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:52
 */

namespace BDD\Table;


class Category
{
    private $_id;
    private $_code;
    private $_label;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->_label = $label;
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
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }
}