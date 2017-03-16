<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/03/17
 * Time: 09:56
 */

namespace BDD\Build;

use BDD\Table\Link;
use Tools\Build;

class LinkBuild extends Build
{
    private $_harborBuild;
    private $_sectorBuild;

    /**
     * @param mixed $harborBuild
     */
    public function setHarborBuild(HarborBuild $harborBuild)
    {
        $this->_harborBuild = $harborBuild;
    }

    /**
     * @param mixed $sectorBuild
     */
    public function setSectorBuild(SectorBuild $sectorBuild)
    {
        $this->_sectorBuild = $sectorBuild;
    }

    protected function build(\stdClass $class)
    {
        $link = new Link($class->id);
        $link->setStartingHarbor($this->_harborBuild->findOne($class->starting_harbor_id));
        $link->setArrivalHarbor($this->_harborBuild->findOne($class->arrival_harbor_id));
        $link->setSector($this->_sectorBuild->findOne($class->sector_id));
        return $link;
    }
}