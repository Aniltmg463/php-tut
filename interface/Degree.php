<?php
interface Degree
{
    public function convertToFahrenheit();
}

class Temperature implements Degree
{
    private $celsius;

    public function __construct($celsius)
    {
        $this->celsius = $celsius;
    }

    public function convertToFahrenheit()
    {
        return ($this->celsius * 9 / 5) + 32;
    }
}

// Example usage
$temp = new Temperature(25); // 25°C
echo "Temperature in Fahrenheit: " . $temp->convertToFahrenheit(); // Output: 77°F