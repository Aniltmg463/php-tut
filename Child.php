<?php
require_once 'Person1.php';

class Child extends Person
{
    private $age;


    public function __construct($name, $age)
    {
        parent::__construct($name);
        $this->age = $age;
    }


    public function sayHello()
    {
        return "Hello, my name is {$this->name} and I am {$this->age} years old.";
    }
}

$obj = new Child("Sunil", 10);
echo $obj->sayHello(); // Output: Hello, my name is Sunil and I am 10 years old.