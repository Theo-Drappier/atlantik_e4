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
    /**
     * @param mixed $crossingBuild
     */
    public function setCrossingBuild(CrossingBuild $crossingBuild)
    {
        $this->_crossingBuild = $crossingBuild;
    }

    protected function build(\stdClass $class)
    {
        $booking = new Booking($class->id);
        $booking->setName($class->name);
        $booking->setCity($class->city);
        $booking->setPostcode($class->postcode);
        $booking->setCrossing($this->_crossingBuild->findOne($class->crossing_id));
        return $booking;
    }
}