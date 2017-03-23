<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:56
 */

namespace BDD\Build;

use BDD\Table\Period;
use Tools\Build;
use Tools\Tools;

class PeriodBuild extends Build
{
    private function __construct()
    {
        $this->_table = 'period';
    }

    protected function build(\stdClass $class)
    {
        $period = new Period($class->id);
        $period->setStartDate(Tools::dateUSToFR($class->start_date));
        $period->setEndDate(Tools::dateUSToFR($class->end_date));
        return $period;
    }

    public static function getInstances()
    {
        if(!isset(self::$_instances['period']))
        {
            self::$_instances['period'] = new PeriodBuild();
        }
        return self::$_instances['period'];
    }

    public function findPeriod($date)
    {
        $url = $this->_address.$this->_table.'/get/'.$date;
        $getJson = file_get_contents($url);
        $class = json_decode($getJson);
        $laClass = $this->build($class);
        return $laClass;
    }
}