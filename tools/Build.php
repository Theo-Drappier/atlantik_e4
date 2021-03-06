<?php

namespace Tools;

abstract class Build
{

    protected $_table;
    protected $_address = 'http://127.0.0.1/E4/atlantik_API/';
    protected static $_instances = array();

    public abstract static function getInstances();

    public function findAll()
    {
        $getJson=file_get_contents($this->_address.'find/'.$this->_table);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }


    public function findOne($id)
    {
        $getJson=file_get_contents($this->_address.'find/'.$this->_table.'/'.$id);
        $class=json_decode($getJson);
        $laClass=$this->build($class);
        return $laClass;
    }

    abstract protected function build(\stdClass $class);

}