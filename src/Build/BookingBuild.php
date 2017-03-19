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
}