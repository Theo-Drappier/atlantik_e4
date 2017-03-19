<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Harbor;
use Tools\Build;

class HarborBuild extends Build
{
    private function __construct()
    {
        $this->_table = 'harbor';
    }

    protected function build(\stdClass $class)
    {
        $harbor = new Harbor($class->id);
        $harbor->setName($class->name);
        return $harbor;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['harbor']))
        {
            self::$_instances['harbor'] = new HarborBuild();
        }
        return self::$_instances['harbor'];
    }
}