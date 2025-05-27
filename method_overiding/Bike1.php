<?php
require_once 'Vehicle1.php'; // Include the parent class

class Bike extends Vehicle
{

    // Override the start method
    public function start()
    {
        echo $this->name . "is starting ";
    }
}

$bike = new Bike();
$bike->name = "Honda shine ";
$bike->start(); // Output: HOnda shine is starting

echo "<br>";
$bike->color(); // Output: HOnda shine is red