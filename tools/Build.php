<?php

namespace Tools;

abstract class Build
{

    protected $_table;
    protected $_adress = 'http://127.0.0.1/ppe_atlantik_api/';

    public function findAll()
    {
        $getJson=file_get_contents($this->_adress.'find/'.$this->_table);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[$row->id]=$this->build($row);
        }
        return $lesClass;
    }

    public function findOne($id)
    {
        $getJson=file_get_contents($this->_adress.'find/'.$this->_table.'/'.$id);
        $tablClass=json_decode($getJson);
        $lesClass=[];
        foreach($tablClass as $row){
            $lesClass[]=$this->build($row);
        }
        return $lesClass[0];
    }

    abstract protected function build(\stdClass $class);

}