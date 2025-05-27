<?php
interface Area
{
    public function CalculateArea();
}

class Circle implements Area
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function CalculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
}
class Square implements Area
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function CalculateArea()
    {
        return pow($this->side, 2);
    }
}


$square = new Square(4);
echo "Area of Square: " . $square->CalculateArea() . "<br>";

$circle = new Circle(3);
echo "Area of Circle: " . $circle->CalculateArea() . "<br>";