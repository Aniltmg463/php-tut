<?php
require_once 'Vehicle.php'; // Include the parent class

class Bike extends Vehicle
{
    // Override the start method
    public function start()
    {
        echo "bike is starting  ";
    }
}

$bike = new Bike();       // Create object of Bike
$bike->start();     // Call the start method
echo "<br>";
$veh = new Vehicle();       // Create object of Bike
$veh->start();