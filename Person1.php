<?php
class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    // Return the greeting string instead of echoing it
    public function sayHello()
    {
        return "Hello, my name is {$this->name}";
    }
}

// Example usage:
$person = new Person("Anil");
echo $person->sayHello(); // Output: Hello, my name is Anil