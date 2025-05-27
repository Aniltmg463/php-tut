<?php
require_once 'Animal.php';

class Cat implements Animal
{
    public function makeSound()
    {
        echo "Meow";
    }
}