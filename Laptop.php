<?php
class Laptop
{
    public $brand;
    public $model;

    // Constructor to initialize brand and model
    public function __construct($brand, $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    // Method to return laptop details
    public function getDetail()
    {
        return "Laptop Brand: {$this->brand}, Model: {$this->model}";
    }
}

// Example usage:
$laptop = new Laptop("Dell", "Inspiron 15");
echo $laptop->getDetail(); // O