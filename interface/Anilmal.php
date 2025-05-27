<?php
interface Animal
{
    public function makeSound();
}

class Cat implements Animal
{
    public function makeSound()
    {
        echo "Meow";
    }
}

class Dog implements Animal
{
    public function makeSound()
    {
        echo "Bark";
    }
}

$animal = new Cat();
$animal->makeSound(); // Output: Meow

echo "<br>";

$animal2 = new Dog();
$animal2->makeSound(); // Output: Bark