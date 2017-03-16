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

class PeriodBuild extends Build
{
    public function __construct()
    {
        $this->_table = 'period';
    }

    protected function build(\stdClass $class)
    {
        $period = new Period($class->id);
        $period->setStartDate($class->start_date);
        $period->setEndDate($class->end_date);
        return $period;
    }
}