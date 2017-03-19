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
    private function __construct()
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

    public function insert(array $userAdd)
    {
        $url = $this->_address.$this->_table.'/add/'.$userAdd['firstname'].'/'.$userAdd['lastname'].'/'.$userAdd['address'].'/'.$userAdd['postcode'].'/'.$userAdd['city'].'/'.$userAdd['email'].'/'.sha1($userAdd['password']);
        $result = file_get_contents($url);
        return json_decode($result);
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['users']))
        {
            self::$_instances['users'] = new UsersBuild();
        }
        return self::$_instances['users'];
    }
}