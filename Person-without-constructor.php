<?php
class Person_constructor
{
    public $name;

    // Method to return the greeting
    public function sayHello()
    {
        // return "Hello, my name is {$this->name}";
        return "Hello, my name is" . "!" . " " .  $this->name;
    }
}

// Example usage:
$person = new Person_constructor();
$person->name = "Anil";
echo $person->sayHello();