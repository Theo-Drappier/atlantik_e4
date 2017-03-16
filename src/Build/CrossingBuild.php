<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Crossing;

class CrossingBuild
{
    private $_linkBuild;
    private $_boatBuild;

    /**
     * @param mixed $linkBuild
     */
    public function setLinkBuild(LinkBuild $linkBuild)
    {
        $this->_linkBuild = $linkBuild;
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
        $crossing = new Crossing($class->id);
        $crossing->setDate($class->date);
        $crossing->setTimeStart($class->time_start);
        $crossing->setLink($this->_linkBuild->findOne($class->link_id));
        $crossing->setBoat($this->_boatBuild->findOne($class->boat_id));
        return $crossing;
    }
}