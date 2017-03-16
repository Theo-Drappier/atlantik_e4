<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:56
 */

namespace BDD\Build;


use BDD\Table\Price;
use Tools\Build;

class PriceBuild extends Build
{
    private $_linkBuild;
    private $_typeBuild;
    private $_periodBuild;

    public function __construct()
    {
        $this->_table = 'price';
    }

    /**
     * @param mixed $linkBuild
     */
    public function setLinkBuild($linkBuild)
    {
        $this->_linkBuild = $linkBuild;
    }

    /**
     * @param mixed $typeBuild
     */
    public function setTypeBuild($typeBuild)
    {
        $this->_typeBuild = $typeBuild;
    }

    /**
     * @param mixed $periodBuild
     */
    public function setPeriodBuild($periodBuild)
    {
        $this->_periodBuild = $periodBuild;
    }

    protected function build(\stdClass $class)
    {
        $price = new Price($class->id);
        $price->setLink($this->_linkBuild->findOne($class->link_id));
        $price->setType($this->_typeBuild->findOne($class->type_id));
        $price->setPeriod($this->_periodBuild->findOne($class->period_id));
        $price->setPrice($class->price);
        return $price;
    }
}