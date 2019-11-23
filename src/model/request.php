<?php

class request
{
    private $id;
    private $name;
    private $dateTime;
    private $room;
    private $row;
    private $seat;
    private $problem;
    private $moduleId;


    public function __construct($Name, $Room, $Row, $Seat, $Problem, $ModuleId)
    {
        $this->name = $Name;
        $this->room = $Room;
        $this->row = $Row;
        $this->seat = $Seat;
        $this->problem = $Problem;
        $this->moduleId = $ModuleId;
        $this->dateTime = getdate();
    }

    public function Id()
    {
        return $this->id;
    }
    public function SetID($Id)
    {
        $this->id = $Id;
    }
    public function Name()
    {
        return $this->name;
    }
    public function DateTime()
    {
        return $this->dateTime;
    }
    public function Room()
    {
        return $this->room;
    }
    public function Row()
    {
        return $this->row;
    }
    public function Seat()
    {
        return $this->seat;
    }
    public function Problem()
    {
        return $this->problem;
    }
    public function ModuleId()
    {
        return $this->moduleId;
    }
}