<?php
class Person2
{
    protected $name;

    // Constructor to initialize the name
    public function __construct($name)
    {
        $this->name = $name;
    }

    // Method to print a greeting
    public function sayHello()
    {
        echo "Hello, my name is {$this->name}";
    }
}

// Example usage:
$person = new Person2("Anil");
$person->sayHello(); // Output: Hello, my name is Anil