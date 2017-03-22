<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:55
 */

namespace BDD\Build;

use BDD\Table\BookingType;
use Tools\Build;

class BookingTypeBuild extends Build
{
    private $_bookingBuild;
    private $_typeBuild;

    private function __construct()
    {
        $this->_table = 'bookingtype';
    }

    /**
     * @param mixed $bookingBuild
     */
    public function setBookingBuild(BookingBuild $bookingBuild)
    {
        $this->_bookingBuild = $bookingBuild;
    }

    /**
     * @param mixed $typeBuild
     */
    public function setTypeBuild(TypeBuild $typeBuild)
    {
        $this->_typeBuild = $typeBuild;
    }

    protected function build(\stdClass $class)
    {
        $bookingType = new BookingType($class->id);
        $bookingType->setQuantity($class->quantity);
        $bookingType->setBooking($this->_bookingBuild->findOne($class->booking_id));
        $bookingType->setType($this->_typeBuild->findOne($class->type_id));
        return $bookingType;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['bookingtype']))
        {
            self::$_instances['bookingtype'] = new BookingTypeBuild();
        }
        return self::$_instances['bookingtype'];
    }

    public function sumPassengerBuy($crossing_id)
    {
        $num=file_get_contents($this->_address.$this->_table.'/sumPassengerBuy/'.$crossing_id);
        return $num;
    }

    public function sumVehicleBuy($crossing_id)
    {
        $num=file_get_contents($this->_address.$this->_table.'/sumVehicleBuy/'.$crossing_id);
        return $num;
    }

    public function sumVehicleHeavyBuy($crossing_id)
    {
        $num=file_get_contents($this->_address.$this->_table.'/sumVehicleHeavyBuy/'.$crossing_id);
        return $num;
    }
}