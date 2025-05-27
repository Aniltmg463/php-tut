<?php
require_once 'Degree.php';

class Temperature implements Degree
{
    private $celsius;

    public function __construct($celsius)
    {
        $this->celsius = $celsius;
    }

    public function convertToFahrenheit()
    {
        // Formula: F = (C × 9/5) + 32
        return ($this->celsius * 9 / 5) + 32;
    }
}