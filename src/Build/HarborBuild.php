<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Harbor;

class HarborBuild
{
    protected function build(\stdClass $class)
    {
        $harbor = new Harbor($class->id);
        $harbor->setName($class->name);
        return $harbor;
    }
}