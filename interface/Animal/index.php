<?php
require_once 'Cat.php';
require_once 'Dog.php';

$animal = new Cat();
$animal->makeSound(); // Output: Meow

echo "<br>";

$animal2 = new Dog();
$animal2->makeSound(); // Output: Bark