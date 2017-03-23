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
use Tools\Tools;

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
        $crossing->setDate(Tools::dateUSToFR($class->date));
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

    public function findLast($date, $limit)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/findLast/'.$date.'/'.$limit);

        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }

    public function findByDateLink($date, $link_id)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/byDateLink/'.$date.'/'.$link_id);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }

    public function findByDateTime($date, $time)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/byDateTime/'.$date.'/'.$time);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }

    public function findByDateTimeLink($date, $time, $link_id)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/byDateTimeLink/'.$date.'/'.$time.'/'.$link_id);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }
}


/*SELECT * FROM `crossing` WHERE date = CURDATE() AND time_start = "17:00:00" LIMIT 10;
SELECT * FROM `crossing` WHERE date > CURRENT_DATE();