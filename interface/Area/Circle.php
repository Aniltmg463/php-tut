<?php
require_once 'Area.php';

class Circle implements Area
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function CalculateArea()
    {
        // return pi() * pow($this->radius, 2);
        return 3.14 * ($this->radius *  $this->radius);
    }
}