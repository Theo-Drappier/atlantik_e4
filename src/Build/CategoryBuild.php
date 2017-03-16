<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Category;

class CategoryBuild
{
    protected function build(\stdClass $class)
    {
        $category = new Category($class->id);
        $category->setCode($class->code);
        $category->setLabel($class->label);
        return $category;
    }
}