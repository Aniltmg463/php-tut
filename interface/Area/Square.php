<?php
require_once 'Area.php';

class Square implements Area
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function CalculateArea()
    {
        // return pow($this->side, 2);
        return ($this->side * $this->side);
    }
}