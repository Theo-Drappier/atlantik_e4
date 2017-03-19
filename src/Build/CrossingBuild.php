<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;


use BDD\Table\Crossing;
use Tools\Build;

class CrossingBuild extends Build
{
    private $_linkBuild;
    private $_boatBuild;

    private function __construct()
    {
        $this->_table = 'crossing';
    }

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

    public static function getInstances()
    {
        if(!isset(self::$_instances['crossing']))
        {
            self::$_instances['crossing'] = new CrossingBuild();
        }
        return self::$_instances['crossing'];
    }
}