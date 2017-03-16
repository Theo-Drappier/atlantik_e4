<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:54
 */

namespace BDD\Table;


class Type
{
    private $_id;
    private $_code;
    private $_label;
    private $_category;

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
     * @param mixed $category
     */
    public function setCategory(Category $category)
    {
        $this->_category = $category;
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

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->_category;
    }
}