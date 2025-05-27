<?php
require_once 'Square.php';
require_once 'Circle.php';

$square = new Square(4);
echo "Area of Square: " . $square->CalculateArea() . "<br>";

$circle = new Circle(3);
echo "Area of Circle: " . $circle->CalculateArea() . "<br>";