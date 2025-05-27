<?php
require_once 'Temperature.php';

$temp = new Temperature(25); // 25°C
echo "Temperature in Fahrenheit: " . $temp->convertToFahrenheit(); // Output: 77°F