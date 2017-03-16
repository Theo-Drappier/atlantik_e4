<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Capacity;
use Tools\Build;

class CapacityBuild extends Build
{
    private $_categoryBuild;
    private $_boatBuild;

    /**
     * @param mixed $categoryBuild
     */
    public function setCategoryBuild(CategoryBuild $categoryBuild)
    {
        $this->_categoryBuild = $categoryBuild;
    }

    /**
     * @param mixed $boatBuild
     */
    public function setBoatBuild(BoatBuild $boatBuild)
    {
        $this->_boatBuild = $boatBuild;
    }


    protected function build(\stdClass $class)
    {
        $capacity = new Capacity($class->id);
        $capacity->setNumber($class->number);
        $capacity->setCategory($this->_categoryBuild->findOne($class->category_id));
        $capacity->setBoat($this->_boatBuild->findOne($class->boat_id));
        return $capacity;
    }
}