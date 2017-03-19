<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:56
 */

namespace BDD\Build;


use BDD\Table\Type;
use Tools\Build;

class TypeBuild extends Build
{
    private $_categoryBuild;

    private function __construct()
    {
        $this->_table = 'type';
    }

    /**
     * @param mixed $categoryBuild
     */
    public function setCategoryBuild(CategoryBuild $categoryBuild)
    {
        $this->_categoryBuild = $categoryBuild;
    }

    protected function build(\stdClass $class)
    {
        $type = new Type($class->id);
        $type->setCode($class->code);
        $type->setLabel($class->label);
        $type->setCategory($this->_categoryBuild->findOne($class->category_id));
        return $type;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['type']))
        {
            self::$_instances['type'] = new TypeBuild();
        }
        return self::$_instances['type'];
    }
}