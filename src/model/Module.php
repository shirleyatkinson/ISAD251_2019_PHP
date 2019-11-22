<?php

class Module
{
    private $code;
    private $title;
    private $id;


    public function __construct($Code, $Title, $Id)
    {
         $this->code = $Code;
        $this->title = $Title;
        $this->id = $Id;
    }

    public function Code()
    {
        return $this->code;
    }
    public function Title()
    {
        return $this->title;
    }
    public function Id()
    {
        return $this->id;
    }
}