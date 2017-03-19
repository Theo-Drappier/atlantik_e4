<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Category;
use Tools\Build;

class CategoryBuild extends Build
{
    private function __construct()
    {
        $this->_table = 'category';
    }

    protected function build(\stdClass $class)
    {
        $category = new Category($class->id);
        $category->setCode($class->code);
        $category->setLabel($class->label);
        return $category;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['category']))
        {
            self::$_instances['category'] = new CategoryBuild();
        }
        return self::$_instances['category'];
    }
}