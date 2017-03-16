<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:54
 */

namespace BDD\Build;

use BDD\Table\Boat;
use Tools\Build;

class BoatBuild extends Build
{
    protected function build(\stdClass $class)
    {
        $boat = new Boat($class->id);
        $boat->setName($class->name);
        return $boat;
    }
}