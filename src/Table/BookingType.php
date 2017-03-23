<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:52
 */

namespace BDD\Table;


class BookingType
{
    private $_id;
    private $_quantity;
    private $_booking;
    private $_type;
    private $_price;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
    }

    /**
     * @param mixed $booking
     */
    public function setBooking(Booking $booking)
    {
        $this->_booking = $booking;
    }

    /**
     * @param mixed $type
     */
    public function setType(Type $type)
    {
        $this->_type = $type;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(Price $price)
    {
        $this->_price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @return mixed
     */
    public function getBooking()
    {
        return $this->_booking;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }
}