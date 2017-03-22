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

    private function __construct()
    {
        $this->_table = 'capacity';
    }

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

    public static function getInstances()
    {
        if(!isset(self::$_instances['capacity']))
        {
            self::$_instances['capacity'] = new CapacityBuild();
        }
        return self::$_instances['capacity'];
    }

    /**
     * find the capacity available on a boat for passenger
     * @param $boat_id
     * @return mixed
     */
    public function findPassengerByBoat($boat_id)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/passengerByBoat/'.$boat_id);
        $class=json_decode($getJson);
        return $class->number;
    }

    /**
     * find the capacity available on a boat for vehicle light
     * @param $boat_id
     * @return mixed
     */
    public function findVehicleLightByBoat($boat_id)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/vehicleLightByBoat/'.$boat_id);
        $class=json_decode($getJson);
        if($class == [])
        {
            $response = null;
        }
        else
        {
            $response = $class->number;
        }
        return $response;
    }

    /**
     * find the capacity available on a boat for vehicle heavy
     * @param $boat_id
     * @return mixed
     */
    public function findVehicleHeavyByboat($boat_id)
    {
        $getJson=file_get_contents($this->_address.$this->_table.'/vehicleHeavyByBoat/'.$boat_id);
        $class=json_decode($getJson);
        if($class == [])
        {
            $response = null;
        }
        else
        {
            $response = $class->number;
        }
        return $response;
    }
}