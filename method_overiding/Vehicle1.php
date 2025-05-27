<?php
class Vehicle
{
    public $name;
    public $color;
    public function start()
    {
        echo $this->name . " is starting ";
    }

    public function color()
    {
        echo $this->name . " is red ";
    }
}

// $obj = new Vehicle();
// // $obj->start("Vehicle is starting");