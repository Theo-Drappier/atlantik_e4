<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:56
 */

namespace BDD\Build;

use BDD\Table\Sector;
use Tools\Build;

class SectorBuild extends Build
{
    private function __construct()
    {
        $this->_table = 'sector';
    }

    protected function build(\stdClass $class)
    {
        $sector = new Sector($class->id);
        $sector->setName($class->name);
        return $sector;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['sector']))
        {
            self::$_instances['sector'] = new SectorBuild();
        }
        return self::$_instances['sector'];
    }
}