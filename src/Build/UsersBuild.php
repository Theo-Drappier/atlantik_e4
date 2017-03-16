<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 16/03/17
 * Time: 10:40
 */

namespace BDD\Build;

use BDD\Table\Users;
use Tools\Build;

class UsersBuild extends Build
{
    public function __construct()
    {
        $this->_table = 'users';
    }

    protected function build(\stdClass $class)
    {
        $user = new Users($class->id);
        $user->setFirstname($class->firstname);
        $user->setLastname($class->lastname);
        $user->setAddress($class->address);
        $user->setPostcode($class->postcode);
        $user->setCity($class->city);
        $user->setEmail($class->email);
        $user->setPassword($class->password);
        return $user;
    }

    public function exists($email, $password)
    {
        $pw = sha1($password);
        $json = file_get_contents($this->_address.$this->_table.'/exists/'.$email.'/'.$pw);
        $tabl = json_decode($json);
        $obj = null;
        if(!is_null($tabl))
        {
            $obj = $this->build($tabl);
        }
        return $obj;
    }
}