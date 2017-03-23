<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;

use BDD\Table\Booking;
use Tools\Build;

class BookingBuild extends Build
{
    private $_crossingBuild;
    private $_usersBuild;

    private function __construct()
    {
        $this->_table = 'booking';
    }

    /**
     * @param mixed $crossingBuild
     */
    public function setCrossingBuild(CrossingBuild $crossingBuild)
    {
        $this->_crossingBuild = $crossingBuild;
    }

    /**
     * @param mixed $usersBuild
     */
    public function setUsersBuild(UsersBuild $usersBuild)
    {
        $this->_usersBuild = $usersBuild;
    }

    protected function build(\stdClass $class)
    {
        $booking = new Booking($class->id);
        $booking->setCrossing($this->_crossingBuild->findOne($class->crossing_id));
        $booking->setUser($this->_usersBuild->findOne($class->users_id));
        return $booking;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['booking']))
        {
            self::$_instances['booking'] = new BookingBuild();
        }
        return self::$_instances['booking'];
    }

    public function findAllByUser($user_id)
    {
        $url = $this->_address.$this->_table.'/byUser/'.$user_id;
        $getJson = file_get_contents($url);
        $tablClass = json_decode($getJson);
        $lesClass = [];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }

    public function insert($crossing_id, $users_id)
    {
        $url = $this->_address.$this->_table.'/add/'.$crossing_id.'/'.$users_id;
        var_dump($url);
        $messageJson = file_get_contents($url);
        $message = json_decode($messageJson);
        return $message;
    }
}